<?php

namespace Modules\Sales\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Capsule;
use App\Livewire\Form\Group;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use Livewire\Component;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Sales\Entities\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Contact\Entities\Contact;
use Modules\Sales\Entities\SalesPerson;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\App\Entities\Email\EmailTemplate;
use Modules\App\Services\Files\FileDownloadService;
use Modules\Inventory\Traits\OperationTransferTrait;
use Modules\Invoicing\Entities\Customer\Invoice;
use Modules\Invoicing\Entities\Customer\InvoiceDetails;
use Modules\Sales\Entities\SalesDetail;

class SaleForm extends BaseForm
{
    use ActionBarButtonTrait, OperationTransferTrait;

    public $sale;
    public $cartInstance = 'sale';

    public $customer, $customer_name,

    $date,

    $expected_date,

    $payment_term ,
    $reference,
    $tax_percentage,
    $tax_amount,
    $discount_percentage,
    $discount_amount,
    $shipping_amount,
    $paid_amount = 0,
    $due_amount = 0,
    $total_amount = 0,
    $payment_method,
    $payment_status,
    $status,
    $note,

    $seller,

    $sellers = [],

    $sales_team,

    $sales_teams = [],

    $tags,

    $shipping_policy,

    $shipping_date,

    $shipping_status,

    $tag;
    public $model, $quotation;
    public $template;

    // Sale Cart
    public $inputs = [];


    public function mount($sale){

        $this->sale= $sale;

            $this->template = EmailTemplate::isCompany(current_company()->id)->applyTo('sale_order')->first()->id;
        $this->model = $sale;
            // Set values
            $this->status = $sale->status;
            $this->customer = $sale->customer_id;
            $this->customer_name = Contact::findOrFail($sale->customer_id)->name;
            $this->date = Carbon::parse($sale->date)->format('Y-m-d');
            $this->expected_date = Carbon::parse($sale->expected_date)->format('Y-m-d');
            $this->payment_term = $sale->payment_term;
            $this->payment_status = $sale->payment_status;
            $this->payment_method = $sale->payment_method;
            $this->reference = $sale->reference;
            $this->tax_percentage = $sale->tax_percentage;
            $this->tax_amount = $sale->tax_amount;
            $this->discount_percentage = $sale->discount_percentage;
            $this->shipping_amount = $sale->shipping_amount;
            $this->total_amount = $sale->total_amount;
            $this->paid_amount = $sale->paid_amount;
            $this->due_amount = $sale->total_amount;
            $this->status = $sale->status;
            $this->note = $sale->note;
            $this->seller = $sale->seller_id;
            $this->sales_team = $sale->sales_team_id;
            // $this->tags = $sale->tags;
            $this->shipping_date = $sale->shipping_date;
            $this->shipping_policy = $sale->shipping_policy;
            $this->shipping_status = $sale->shipping_status;
            // Order Details
            // $this->inputs = $sale->quotationDetails;,

            // Block the field
            $this->blocked = true;

    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('customer',__('translator::components.inputs.customer.label'), 'select', 'customer', 'left', 'none', 'none')->component('inputs.select.contact'),
            Input::make('date',__('translator::components.inputs.date.label'), 'date', 'date', 'right', 'none', 'none'),
            Input::make('payment_term',__('translator::components.inputs.payment-term.label'), 'select', 'payment_term', 'right', 'none', 'none')->component('inputs.select.payment_term'),

            //Note
            Input::make('note',__('translator::components.inputs.note.label'), 'textarea', 'note', '', 'summary', 'none', __('translator::components.inputs.note.placeholder'))->component('inputs.textarea.tabs-middle'),

            // Sales
            Input::make('salesTeams',__('translator::components.inputs.sales-teams.label'), 'select', 'sales_team', '', 'other', 'sales')->component('inputs.select.sales_teams'),
            Input::make('seller',__('translator::components.inputs.seller.label'), 'select', 'seller', '', 'other', 'sales')->component('inputs.select.sales.seller'),
            Input::make('tags',__('translator::components.inputs.tags.label'), 'select', 'tags', '', 'other', 'sales')->component('inputs.select.sales.tags'),

            // Shipping
            Input::make('shipping_policy',__('translator::components.inputs.delivery-policy.label'), 'select', 'shipping_policy', '', 'other', 'delivery')->component('inputs.select.shipping.policy'),
            Input::make('shipping_date',__('translator::components.inputs.delivery-date.label'), 'date', 'shipping_date', '', 'other', 'delivery'),
            Input::make('shipping_status',__('translator::components.inputs.delivery-status.label'), 'select', 'shipping_status', '', 'other', 'delivery')->component('inputs.select.shipping.status'),

            // Invoicing
            Input::make('fiscal_position',__('translator::components.inputs.tax-position.label'), 'text', 'fiscal_position', '', 'other', 'invoicing'),

            // Tracking
            Input::make('source_document',__('translator::components.inputs.original-document.label'), 'text', 'source_document', '', 'other', 'tracking'),
            Input::make('campaign',__('translator::components.inputs.campaign.label'), 'select', 'campaign', '', 'other', 'tracking')->component('inputs.select.tracking.campaign'),
            Input::make('medium',__('translator::components.inputs.medium.label'), 'select', 'medium', '', 'other', 'tracking')->component('inputs.select.tracking.campaign'),
            Input::make('source',__('translator::components.inputs.source.label'), 'select', 'source', '', 'other', 'tracking')->component('inputs.select.tracking.campaign'),

        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('order',__('translator::sales.form.sale.tabs.orders'))->component('tabs.sale-order'),
            Tabs::make('other',__('translator::sales.form.sale.tabs.others')),
            Tabs::make('summary',__('translator::sales.form.sale.tabs.note'))->component('tabs.note.summary'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('sales',__('translator::sales.form.sale.groups.sales'), 'other'),
            Group::make('delivery',__('translator::sales.form.sale.groups.delivery'), 'other'),
            Group::make('invoicing',__('translator::sales.form.sale.groups.invoicing'), 'other'),
            Group::make('tracking',__('translator::sales.form.sale.groups.tracking'), 'other'),
        ];
    }

    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            // key, label, action, primary
            // ActionBarButton::make('invoice', 'Créer une facture', 'storeQT()', 'sale_order'),
            ActionBarButton::make('invoice', __('translator::sales.form.sale.actions.invoice'), "createInvoice", $this->status)->component('button.action-bar.invoice.create-sale-invoice'),
            ActionBarButton::make('send', __('translator::sales.form.sale.actions.send-email'), '', 'sent')->component('button.action-bar.send-email'),
            ActionBarButton::make('preview', __('translator::sales.form.sale.actions.preview'), 'preview()', 'previewed'),
            ActionBarButton::make('cancel', __('translator::sales.form.sale.actions.cancel'), 'canceled', 'cancelled'),
            ActionBarButton::make('make-quotation', __('translator::sales.form.sale.actions.make-quotation'), '', 'canceled')->component('button.action-bar.canceled.simple'),
            ActionBarButton::make('unlock',  $this->blocked ? __('translator::sales.form.sale.actions.unlock') : __('translator::sales.form.sale.actions.lock'), $this->blocked ? "unlock()" : "lock()", 'confirmed'),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['invoice', 'send', 'preview', 'cancel']; // Adjust as needed

        // Change dynamicaly the display order depends on status
        return $this->sortActionButtons($buttons, $customOrder, $status);


    }

    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('quotation', __('translator::sales.form.sale.status.quotation'), 'quotation'),
            StatusBarButton::make('sent', __('translator::sales.form.sale.status.sent'), 'sent'),
            StatusBarButton::make('sale_order', __('translator::sales.form.sale.status.order'), 'sale_order')->component('button.status-bar.default-selected'),
            StatusBarButton::make('canceled', __('translator::sales.form.sale.status.canceled'), 'canceled')->component('button.status-bar.canceled'),
            // Add more buttons as needed
        ];
    }

    public function capsules() : array
    {
        return [
            Capsule::make('shipping', __('translator::sales.form.sale.capsules.shippings.name'), __('translator::sales.form.sale.capsules.shippings.text'))->component('capsules.sale.delivery'),
            Capsule::make('quotation', __('translator::sales.form.sale.capsules.quotations.name'), __('translator::sales.form.sale.capsules.quotations.text'))->component('capsules.sale.quotation'),
            Capsule::make('invoice', __('translator::sales.form.sale.capsules.invoices.name'), __('translator::sales.form.sale.capsules.invoices.text'))->component('capsules.invoice.sale-invoice'),
            // Add more buttons as needed
        ];
    }

    #[On('update-sale')]
    public function updateSale(){

        $sale = $this->sale;
        $due_amount = $this->total_amount - $this->paid_amount;

        if ($due_amount == $this->total_amount) {
            $this->payment_status = 'unpaid';
        } elseif ($due_amount > 0) {
            $this->payment_status = 'partial';
        } else {
            $this->payment_status = 'paid';
        }

        foreach ($sale->saleDetails as $sale_detail) {
            if ($sale->shipping_status == 'delivered' || $sale->shipping_status == 'completed') {
                $product = Product::findOrFail($sale_detail->product_id);
                $product->update([
                    'product_quantity' => $product->product_quantity + $sale_detail->quantity
                ]);
            }
            $sale_detail->delete();
        }
        $sale->update([
            'date' => $this->date,
            'payment_status' => $this->payment_status,
            'payment_term' => $this->payment_term,
            'payment_method' => $this->payment_method,
            'seller_id' => $this->seller, //customer id
            'sales_team_id' => $this->sales_team, //customer id
            'customer_id' => 1, //customer id
            'tax_percentage' => 18.9,
            'discount_percentage' => 0,
            'shipping_amount' => 0,
            'shipping_date' => $this->shipping_date,
            'shipping_policy' => $this->shipping_policy,
            'shipping_status' => $this->shipping_status,
            'total_amount' => $this->total_amount * 100,
            'paid_amount' => $this->paid_amount,
            'due_amount' => $this->total_amount * 100, //$due_amount
            'status' => $this->status,
            // 'status' => $this->status,
            'note' => $this->note,
            'tax_amount' => 0,
            'discount_amount' => 0,
        ]);

        foreach ($this->inputs as $detail) {

            SalesDetail::create([
                'sale_id' => $sale->id,
                'product_id' => $detail['product'],
                'description' => $detail['description'],
                'product_name' => Product::find( $detail['product'] )->product_name,
                'product_code' => Product::find( $detail['product'] )->product_code,
                'quantity' => $detail['quantity'],
                'price' => $detail['price'] * 100,
                'unit_price' => $detail['price'] * 100,
                'sub_total' => $detail['subtotal'] * 100,
                'product_discount_amount' => 0,
                'product_discount_type' => 'fixed',
                'product_tax_amount' => 0,
            ]);

            if ($this->shipping_status == 'shipped' && !module('inventory') || $this->shipping_status == 'completed' && !module('inventory')) {
                $product = Product::findOrFail($detail['product']);
                $product->update([
                    'product_quantity' => $product->product_quantity - $detail['quantity']
                ]);
            }
        }

        notify()->success(__('translator::sales.form.sale.messages.success.sale-update'));

        return redirect()->route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'menu' => current_menu()]);
    }

    #[On('sale-cart')]
    public function updateInputs($inputs, $total, $totalHT){
        $this->inputs = $inputs;
        $this->total_amount = $total;
    }

    // Cancel sale order
    public function canceled(){

        $this->sale->update([
            'status' => 'canceled',
        ]);
        $this->sale->save();

        $this->status = 'canceled';
        // $this->dispatch('canceledQuotation', $quotation);
        return redirect()->route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $this->sale->id, 'menu' => current_menu()]);
    }

    #[On('reset-form')]
    public function resetForm(){
        return redirect()->route('sales.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    // Create Invoice
    public function createInvoice(){

        $sale = $this->sale;
        $invoice = Invoice::create([
            'company_id' => $sale->company_id,
            'sale_id' => $sale->id,
            'customer_id' => $sale->customer_id,
            // 'reference' => 'INV/'.$sale->reference,
            'date' => now(),
            // 'date' => $sale->date,
            'due_date' => $sale->expected_date,
            'shipping_date' => $sale->shipping_date,
            'payment_term' => $sale->payment_term,
            'payment_status' => 'unpaid',
            'seller_id' => $sale->seller_id,
            'sales_team_id' => $sale->sales_team_id,
            'terms' => $sale->terms,
            'total_amount' => $sale->total_amount * 100,
            'paid_amount' => $sale->paid_amount * 100,
            'due_amount' => $sale->due_amount * 100,
            'status' => 'draft',
            'to_checked' => false,
        ]);
        $invoice->save();

        $sale->update([
            'status' => 'invoiced',
        ]);

        // $invoiceDetails = $invoice->invoiceDetails;
            $sale_details = $sale->saleDetails;

        foreach($sale_details as $detail) {
            //Create sale from quotation view without create quotation
            InvoiceDetails::create([
                'customer_invoice_id' => $invoice->id,
                'product_id' => $detail->product_id,
                'label' => $detail->product_name,
                'product_name' => $detail->product_name,
                'quantity' => $detail->quantity,
                'price' => $detail->price,
                'unit_price' => $detail->unit_price,
                'sub_total' => $detail->sub_total,
                'product_discount_amount' => $detail->product_discount_amount,
                'product_discount_type' => $detail->product_discount_type,
                'product_tax_amount' => $detail->product_tax_amount,
            ]);

        }

        notify()->success(__('translator::sales.form.sale.messages.success.invoice-create'));

        // Redirect to invoice
        return redirect()->route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'invoice' => $invoice->id, 'menu' => current_menu()]);

    }


    // Print sale
    #[On('print-sale')]
    public function print(){

        if (!$this->sale) {
            throw new \Exception('sale not found');
        }

        $sale = Sale::findOrFail($this->sale->id);

        $customer = Contact::findOrFail($sale->customer_id);
        $seller = SalesPerson::findOrFail($sale->seller_id);
        $company = current_company();

        $fileName = 'Commande - '. $sale->reference; // The desired file name of the downloaded PDF
        $view = 'sales::print-sale'; // Example view that you want to convert to PDF
        $data = [
            'sale' => $sale,
            'customer' => $customer,
            'seller' => $seller,
            'company' => $company
        ]; // Data to be passed to the view

        $fileDownloadService = new FileDownloadService();

        // Use the downloadPdf method from the service
        return $fileDownloadService->downloadPdf($fileName, $view, $data);
    }

    #[On('delete-sale')]
    public function deleteQT(Sale $sale)
    {
        // $sale = sale::find($sale);
        $sale->delete();
        return redirect()->route('sales.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function unlock(){
        $this->blocked = false;
        $this->dispatch('unlock-sale');
    }

    public function lock(){
        $this->blocked = true;
        $this->dispatch('lock-sale');
    }

}
