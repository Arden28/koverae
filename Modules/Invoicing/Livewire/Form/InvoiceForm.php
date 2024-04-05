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

    public function mount($sale, $invoice){
        // dd($invoice->id, $sale->id);
        // Cart::instance('quotation')->destroy();

        Cart::instance('sale')->destroy();

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

            // Update the cart
            $invoice_details = $invoice->invoiceDetails;



            $cart = Cart::instance('sale');

            foreach ($invoice_details as $invoice_detail) {
                $cart->add([
                    'id'      => $invoice_detail->product_id,
                    'name'    => $invoice_detail->product_name,
                    'qty'     => $invoice_detail->quantity,
                    'price'   => $invoice_detail->price / 100,
                    'weight'  => 1,
                    'options' => [
                        'product_discount' => $invoice_detail->product_discount_amount / 100,
                        'product_discount_type' => $invoice_detail->product_discount_type,
                        'sub_total'   => $invoice_detail->sub_total / 100,
                        'code'        => $invoice_detail->product_code,
                        'stock'       => Product::findOrFail($invoice_detail->product_id)->product_quantity,
                        'product_tax' => $invoice_detail->product_tax_amount,
                        'unit_price'  => $invoice_detail->unit_price / 100
                    ]
                ]);

                // $cart->destroy();
            }
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('customer','Client', 'select', 'customer', 'left', 'none', 'none')->component('inputs.select.contact'),
            Input::make('date','Date', 'date', 'date', 'right', 'none', 'none')->component('inputs.date.complete_readonly'),
            Input::make('payment_reference','Référence de paiement', 'text', 'payment_reference', 'right', 'none', 'none'),
            Input::make('payment_term','Modalité de paiement', 'select', 'payment_term', 'right', 'none', 'none')->component('inputs.select.payment_term'),
            Input::make('journal','Journal', 'select', 'journal', 'right', 'none', 'none')->component('inputs.invoice.journal'),

            //Note
            Input::make('note','Modalité de paiement', 'textarea', 'note', '', 'summary', 'none', 'Note interne')->component('inputs.textarea.tabs-middle'),

            // Invoice
            Input::make('salesTeams','Equipe de vente', 'select', 'sales_team', '', 'other', 'invoice')->component('inputs.select.sales_teams'),
            Input::make('seller','Commercial(e)', 'select', 'seller', '', 'other', 'invoice')->component('inputs.select.sales.seller'),
            Input::make('bank_account','Compte bancaire destinataire', 'text', 'bank_account', '', 'other', 'invoice'),
            Input::make('customer_reference','Référence client', 'text', 'customer_reference', '', 'other', 'invoice'),
            Input::make('shipping_date','Date de livraison', 'text', 'shipping_date', '', 'other', 'invoice')->component('inputs.date.disable-date'),

            // Shipping
            Input::make('shipping_policy','Politique de livraison', 'select', 'shipping_policy', '', 'other', 'delivery')->component('inputs.select.shipping.policy'),
            Input::make('shipping_status','Status', 'select', 'shipping_status', '', 'other', 'delivery')->component('inputs.select.shipping.status'),

            // Invoicing
            Input::make('fiscal_position',"Position fiscale", 'text', 'fiscal_position', '', 'other', 'invoicing'),

            // Tracking
            Input::make('source_document',"Document d'origine", 'text', 'source_document', '', 'other', 'tracking'),
            Input::make('campaign',"Campagne", 'select', 'campaign', '', 'other', 'tracking')->component('inputs.select.tracking.campaign'),
            Input::make('medium',"Moyen", 'select', 'medium', '', 'other', 'tracking')->component('inputs.select.tracking.campaign'),
            Input::make('source',"Source", 'select', 'source', '', 'other', 'tracking')->component('inputs.select.tracking.campaign'),

        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('order','Ligne de facture')->component('tabs.order'),
            Tabs::make('accounting_entry','Ecritures comptables'),
            Tabs::make('other','Autres Informations'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('invoice','Facture', 'other'),
            // Group::make('delivery','Comptabilité', 'other'),
        ];
    }

    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            // key, label, action, primary
            // ActionBarButton::make('invoice', 'Créer une facture', 'storeQT()', 'sale_order'),
            ActionBarButton::make('register_payment', 'Enregistrer un paiement', "registerPayment", 'posted')->component('button.action-bar.invoice.register-payment'),
            ActionBarButton::make('preview', 'Aperçu', 'preview()', 'posted')->component('button.action-bar.if-status'),
            // ActionBarButton::make('cancel', 'Annuler', 'canceled', 'cancelled'),
            ActionBarButton::make('draft', 'Remettre en brouillon', '', 'posted')->component('button.action-bar.if-status'),
            ActionBarButton::make('confirm', 'Confirmer', 'confirm', 'draft')->component('button.action-bar.invoice.confirm'),
            ActionBarButton::make('cancel', 'Annuler', 'cancel', 'draft')->component('button.action-bar.if-status'),
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
            Capsule::make('sale', 'Bons de commande', 'Les ventes ayant engendrés cette commande..')->component('capsules.sale-capsule'),
            // Capsule::make('quotation', 'Devis', 'Les devis ayant engendrés cette commande..')->component('capsules.sale.quotation'),
            // Add more buttons as needed
        ];
    }

    // Status Bar

    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('draft', 'Brouillon', 'draft'),
            StatusBarButton::make('posted', 'Comptabilisé', 'posted'),
            StatusBarButton::make('canceled', 'Annulée', 'canceled')->component('button.status-bar.canceled'),
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

        try {

            if (!$invoice) {
                throw new \Exception('Facture non trouvée');
            }

            $customer = Contact::findOrFail($invoice->customer_id);
            $seller = SalesPerson::findOrFail($invoice->seller->id);
            $company = current_company();

            $pdf = Pdf::loadView('sales::print-invoice', [
                'invoice' => $invoice,
                'customer' => $customer,
                'seller' => $seller,
                'company' => $company
            ])->setPaper('a4');

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output(); // Echo download contents directly...
            }, 'Facture - ' . str_replace('/', '_', $invoice->reference) . '.pdf'); //replace / by _

            // return response($utf8Output)->download('invoice-' . $invoice->reference . '.pdf');
        } catch (\Exception $e) {
            Log::error('Error generating invoice PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }

    #[On('delete-invoice')]
    public function deleteQT(Invoice $invoice)
    {
        // $invoice = invoice::find($invoice);
        $invoice->delete();
        return redirect()->route('sales.invoices.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }
}
