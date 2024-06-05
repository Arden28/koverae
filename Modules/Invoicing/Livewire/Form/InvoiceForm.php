<?php

namespace Modules\Invoicing\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Capsule;
use App\Livewire\Form\Group;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Contact\Entities\Contact;
use Modules\Invoicing\Entities\Customer\Invoice;
use Modules\Invoicing\Entities\Payment\InvoicePayment;
use Modules\Sales\Entities\SalesTeam;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Accounting\Entities\Journal;
use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesPerson;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Modules\App\Services\Files\FileDownloadService;
use Modules\App\Services\LinkService\LinkGenerationService;
use Modules\Invoicing\Entities\Customer\InvoiceDetails;

class InvoiceForm extends BaseForm
{
    use ActionBarButtonTrait;

    public $sale, $invoice;

    public $cartInstance = 'sale';

    public $customer, $customer_name, $customer_reference, $bank_account,

    $date,

    $due_date,

    $payment_term ,
    $reference,
    $payment_reference,
    $tax_percentage,
    $tax_amount,
    $discount_percentage,
    $discount_amount,
    $shipping_amount,
    $shipping_date,
    $paid_amount,
    $due_amount,
    $total_amount,
    $payment_method,
    $payment_status,
    $status,
    $terms,

    $seller,

    $sellers = [],

    $sales_team;

    public $invoice_journal, $journal_name;

    public $journal;

    protected $fileDownloadService;

    public function mount($sale, $invoice = null){

        if($invoice){

            if($invoice->status == 'posted'){
                $this->blocked = true;
            }

            $this->invoice = $invoice;
            $this->sale = $sale;
                // Set values
                $this->customer = $invoice->customer_id;
                $this->customer_name = Contact::findOrFail($invoice->customer_id)->name;
                $this->customer_reference = Contact::findOrFail($invoice->customer_id)->reference;
                $this->date = Carbon::parse($invoice->date)->format('Y-m-d');
                $this->due_date = Carbon::parse($invoice->due_date)->format('Y-m-d');
                $this->payment_reference = $invoice->payment_reference;
                $this->payment_term = $invoice->payment_term;
                $this->payment_status = $invoice->payment_status;
                $this->payment_method = $invoice->payment_method;
                $this->reference = $invoice->reference;
                $this->tax_percentage = $invoice->tax_percentage;
                $this->tax_amount = $invoice->tax_amount;
                $this->discount_percentage = $invoice->discount_percentage;
                $this->shipping_amount = $invoice->shipping_amount;
                $this->total_amount = $invoice->total_amount;
                $this->paid_amount = $invoice->paid_amount;
                $this->due_amount = $invoice->total_amount;
                $this->status = $invoice->status;
                // Accounting
                $this->journal = $invoice->journal_id;
                // $this->note = $invoice->note;
                $this->seller = $invoice->seller_id;
                $this->sales_team = $invoice->sales_team_id;
                $this->shipping_date = $invoice->shipping_date;
                // $this->journal_name = Journal::findOrFail($invoice->journal_id)->name;

        }

            // $linkGenerator = new LinkGenerationService();
            // dd($linkGenerator->generatePaymentLink(str()->uuid()->toString(), $this->paid_amount /100, $this->invoice->id));

    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('customer',__('translator::components.inputs.customer.label'), 'select', 'customer', 'left', 'none', 'none')->component('inputs.select.contact'),
            Input::make('date',__('translator::components.inputs.date.label'), 'date', 'date', 'right', 'none', 'none')->component('inputs.date.local'),
            Input::make('payment_reference',__('translator::components.inputs.payment-reference.label'), 'text', 'payment_reference', 'right', 'none', 'none'),
            Input::make('payment_term',__('translator::components.inputs.payment-term.label'), 'select', 'payment_term', 'right', 'none', 'none')->component('inputs.select.payment_term'),
            Input::make('journal',__('translator::components.inputs.journal.label'), 'select', 'journal', 'right', 'none', 'none')->component('inputs.invoice.journal'),

            //Note
            Input::make('note',__('translator::components.inputs.note.label'), 'textarea', 'note', '', 'summary', 'none', __('translator::components.inputs.note.placeholder'))->component('inputs.textarea.tabs-middle'),

            // Invoice
            Input::make('customer_reference',__('translator::components.inputs.customer-reference.label'), 'text', 'customer_reference', '', 'other', 'invoice'),
            Input::make('salesTeams',__('translator::components.inputs.sales-teams.label'), 'select', 'sales_team', '', 'other', 'sales')->component('inputs.select.sales_teams'),
            Input::make('seller',__('translator::components.inputs.seller.label'), 'select', 'seller', '', 'other', 'sales')->component('inputs.select.sales.seller'),
            Input::make('bank_account',__('translator::components.inputs.customer-bank-account.label'), 'text', 'bank_account', '', 'other', 'invoice'),
            Input::make('shipping_date',__('translator::components.inputs.delivery-date.label'), 'text', 'shipping_date', '', 'other', 'invoice')->component('inputs.date.disable-date'),

            // Invoicing
            Input::make('fiscal_position',__('translator::components.inputs.tax-position.label'), 'text', 'fiscal_position', '', 'other', 'invoicing'),


        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('order',__('translator::sales.form.invoice.tabs.order'))->component('tabs.invoice-line'),
            Tabs::make('accounting_entry',__('translator::sales.form.invoice.tabs.accounting_entry')),
            Tabs::make('other',__('translator::sales.form.invoice.tabs.other')),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('invoice',__('translator::sales.form.invoice.groups.invoice'), 'other'),
            // Group::make('delivery','Comptabilité', 'other'),
        ];
    }

    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            // key, label, action, primary
            // ActionBarButton::make('invoice', 'Créer une facture', 'storeQT()', 'sale_order'),
            ActionBarButton::make('register_payment', __('translator::sales.form.invoice.actions.register-payment'), "registerPayment", 'posted')->component('button.action-bar.invoice.register-payment'),
            ActionBarButton::make('preview', __('translator::sales.form.invoice.actions.preview'), 'preview()', 'posted')->component('button.action-bar.if-status'),
            ActionBarButton::make('draft', __('translator::sales.form.invoice.actions.draft'), '', 'posted')->component('button.action-bar.if-status'),
            ActionBarButton::make('confirm', __('translator::sales.form.invoice.actions.confirm'), 'confirm', 'draft')->component('button.action-bar.invoice.confirm'),
            ActionBarButton::make('cancel', __('translator::sales.form.invoice.actions.cancel'), 'cancel', 'draft')->component('button.action-bar.if-status'),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['invoice', 'send', 'preview', 'cancel']; // Adjust as needed

        // Change dynamicaly the display order depends on status
        return $this->sortActionButtons($buttons, $customOrder, $status);


    }

    public function capsules() : array
    {
        return [
            Capsule::make('sale', __('translator::sales.form.invoice.capsules.orders.name'), __('translator::sales.form.invoice.capsules.orders.text'))->component('capsules.sale-capsule'),
            // Capsule::make('quotation', 'Devis', 'Les devis ayant engendrés cette commande..')->component('capsules.sale.quotation'),
            // Add more buttons as needed
        ];
    }

    // Status Bar

    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('draft', __('translator::sales.form.invoice.status.draft'), 'draft'),
            StatusBarButton::make('posted', __('translator::sales.form.invoice.status.posted'), 'posted'),
            StatusBarButton::make('canceled', __('translator::sales.form.invoice.status.canceled'), 'canceled')->component('button.status-bar.canceled'),
            // Add more buttons as needed
        ];
    }

    // public function openModal(){
    //     $this->dispatch('modal.open', component: 'modal.invoice.register-payment', arguments: ['invoice' => $this->invoice]);
    // }
    public function confirm(){
        $this->invoice->update([
            'status' => 'posted'
        ]);
        $this->invoice->save();

        return redirect()->route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $this->invoice->sale_id, 'invoice' => $this->invoice->id, 'menu' => current_menu()]);
    }

    // Update Invoice
    #[On('update-invoice')]
    public function updateInvoice(){
        $invoice = $this->invoice;

        foreach ($invoice->invoiceDetails as $invoice_detail) {
            if ($invoice->shipping_status == 'delivered' || $invoice->shipping_status == 'completed') {
                $product = Product::findOrFail($invoice_detail->product_id);
                $product->update([
                    'product_quantity' => $product->product_quantity + $invoice_detail->quantity
                ]);
            }
            $invoice_detail->delete();
            DB::transaction(function() use ($invoice) {

                $invoice->update([
                    'company_id' => $invoice->company_id,
                    'invoice_id' => $invoice->id,
                    'customer_id' => $invoice->customer_id,
                    // 'reference' => 'INV/'.$invoice->reference,
                    'date' => $this->date,
                    'due_date' => $invoice->due_date,
                    'shipping_date' => $invoice->shipping_date,
                    'payment_term' => $invoice->payment_term,
                    'payment_status' => 'unpaid',
                    'seller_id' => $invoice->seller_id,
                    'terms' => $invoice->terms,
                    'total_amount' => $invoice->total_amount * 100,
                    'paid_amount' => $invoice->paid_amount * 100,
                    'due_amount' => $invoice->due_amount * 100,
                    'status' => 'draft',
                    'to_checked' => false,
                ]);

                foreach (Cart::instance('sale')->content() as $cart_item) {

                    InvoiceDetails::create([
                        'customer_invoice_id' => $invoice->id,
                        'product_id' => $cart_item->product_id,
                        'label' => $cart_item->product_name,
                        'product_name' => $cart_item->product_name,
                        'quantity' => $cart_item->quantity,
                        'price' => $cart_item->price,
                        'unit_price' => $cart_item->unit_price,
                        'sub_total' => $cart_item->sub_total,
                        'product_discount_amount' => $cart_item->product_discount_amount,
                        'product_discount_type' => $cart_item->product_discount_type,
                        'product_tax_amount' => $cart_item->product_tax_amount,
                    ]);

                    if ($this->shipping_status == 'Shipped' || $this->shipping_status == 'Completed') {
                        $product = Product::findOrFail($cart_item->id);
                        $product->update([
                            'product_quantity' => $product->product_quantity - $cart_item->qty
                        ]);
                    }
                }

                Cart::instance('sale')->destroy();


            });

            return redirect()->route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $invoice->sale_id, 'invoice' => $invoice->id, 'menu' => current_menu()]);
        }
    }

    #[On('print-invoice')]
    // Print Invoice
    public function print(Invoice $invoice){

        if (!$invoice) {
            throw new \Exception('Facture non trouvée');
        }

        $customer = Contact::findOrFail($invoice->customer_id);
        $seller = SalesPerson::findOrFail($invoice->seller->id);
        $company = current_company();
        $view = 'sales::print-invoice'; // Example view that you want to convert to PDF
        $data = [
            'invoice' => $invoice,
            'customer' => $customer,
            'seller' => $seller,
            'company' => $company
        ]; // Data to be passed to the view

        $fileName = 'Facture - '. $invoice->reference; // The desired file name of the downloaded PDF

        $fileDownloadService = new FileDownloadService();

        // Use the downloadPdf method from the service
        return $fileDownloadService->downloadPdf($fileName, $view, $data);
    }

    #[On('delete-invoice')]
    public function deleteQT(Invoice $invoice)
    {
        // $invoice = invoice::find($invoice);
        $invoice->delete();
        return redirect()->route('sales.invoices.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }


}
