<?php

namespace Modules\Purchase\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Capsule;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Modules\Contact\Entities\Contact;
use Modules\Purchase\Entities\Purchase;
use Modules\Purchase\Entities\PurchaseDetail;
use Modules\Purchase\Entities\Request\RequestQuotation;
use Modules\Purchase\Entities\Request\RequestQuotationDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Employee\Entities\Employee;
use Modules\Invoicing\Entities\Vendor\Bill;
use Modules\Invoicing\Entities\Vendor\BillDetail;

class PurchaseForm extends BaseForm
{
    use ActionBarButtonTrait;

    public $cartInstance = 'purchase';
    public $purchase;
    public $reference, $invoice, $status, $supplier, $supplier_reference, $date, $deadline_date, $expected_arrival_date, $buyer, $source_document, $tags = [], $payment_term, $fiscal_position, $term;
    public bool $ask_confirmation = false, $reminder_date_before_receipt = false, $updateMode = false;
    // Cart
    public $total_amount = 0, $paid_amount = 0, $due_amount = 0, $tax_percentage = 18.9, $tax_amount = 0, $discount_percentage = 0, $discount_amount = 0, $shipping_amount = 0, $qty = 1;

    public function mount($purchase){
        $this->purchase = $purchase;
        $this->reference = $purchase->reference;
        $this->status = $purchase->status;
        $this->supplier = $purchase->supplier_id;
        $this->supplier_reference = $purchase->supplier_reference;
        $this->deadline_date = Carbon::parse($purchase->deadline_date)->format('Y-m-d H:i:s');
        $this->expected_arrival_date = Carbon::parse($purchase->expected_arrival_date)->format('Y-m-d H:i:s');
        $this->buyer = $purchase->buyer_id;
        $this->payment_term = $purchase->payment_term;
        $this->source_document = $purchase->source_document;
        $this->fiscal_position = $purchase->fiscal_position;
        $this->term = $purchase->terms;

        // Update the cart
        $purchase_details = $purchase->purchaseDetails;

        Cart::instance('purchase')->destroy();

        $cart = Cart::instance('purchase');

        foreach ($purchase_details as $purchase_detail) {
            $cart->add([
                'id'      => $purchase_detail->product_id,
                'name'    => $purchase_detail->product_name,
                'qty'     => $purchase_detail->quantity,
                'price'   => $purchase_detail->price,
                'weight'  => 1,
                'options' => [
                    'description'  => $purchase_detail->product->description,
                    'product_discount' => $purchase_detail->product_discount_amount,
                    'product_discount_type' => $purchase_detail->product_discount_type,
                    'sub_total'   => $purchase_detail->sub_total,
                    'code'        => $purchase_detail->product_code,
                    'stock'       => Product::findOrFail($purchase_detail->product_id)->product_quantity,
                    'product_tax' => $purchase_detail->product_tax_amount,
                    'unit_price'  => $purchase_detail->unit_price
                ]
            ]);
        }
    }

    protected $rules= [
        'supplier' => 'required',
        'supplier_reference' => 'nullable',
        'date' => 'nullable',
        'deadline_date' => 'required',
        'expected_arrival_date' => 'nullable',
        'ask_confirmation' => 'nullable|boolean',
        'reminder_date_before_receipt' => 'nullable|boolean',
        // Purchase
        'buyer' => 'nullable',
        'source_document' => 'nullable',
        'tags' => 'nullable',
        // Invoicing
        'payment_term' => 'required',
        'fiscal_position' => 'nullable',

    ];

    // Inputs
    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('supplier','Fournisseur', 'select', 'supplier', 'left', 'none', 'none')->component('inputs.select.readonly.contact'),
            Input::make('supplier_reference','Référence Fournisseur', 'text', 'supplier_reference', 'left', 'none', 'none'),
            // Input::make('date',"Date", 'date', 'date', 'right', 'none', 'none')->component('inputs.date.complete_readonly'),
            Input::make('deadline_date',"Echéance", 'datetime-local', 'deadline_date', 'right', 'none', 'none'),
            Input::make('expected_arrival_date','Arrivée prévue', 'datetime-local', 'expected_arrival_date', 'right', 'none', 'none'),
            Input::make('ask_confirmation','Demande de confirmation', 'checkbox', 'ask_confirmation', 'right', 'none', 'none')->component('inputs.ask-confirmation'),

            // Purchase
            Input::make('buyer','Acheteur', 'select', 'buyer', '', 'other', 'purchases')->component('inputs.select.contact'),
            Input::make('source_document','Document', 'text', 'source_document', '', 'other', 'purchases'),
            Input::make('tags','Tag(s)', 'select', 'tags', '', 'other', 'sales')->component('inputs.select.sales.tags'),

            // Invoicing
            Input::make('payment_term',"Modalité de paiement", 'select', 'payment_term', '', 'other', 'invoicing')->component('inputs.select.payment_term'),
            Input::make('fiscal_position',"Position fiscale", 'text', 'fiscal_position', '', 'other', 'invoicing'),

        ];
    }

    // Tabs
    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('purchase','Produits')->component('tabs.purchase'),
            Tabs::make('other','Autres Informations'),
        ];
    }

    // Inputs Group
    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('purchases','Achat', 'other'),
            Group::make('invoicing','Facturation', 'other'),
        ];
    }

    // Action Bar Buttons
    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            ActionBarButton::make('reception', 'Recevoir les produits', 'receiveOrder()', 'purchase_order'),
            ActionBarButton::make('invoice', 'Créer une facture fournisseur', 'createInvoice', 'purchase_order')->component('button.action-bar.invoice-button'),
            ActionBarButton::make('send', 'Envoyer par email', 'sendByEmail()', ''),
            ActionBarButton::make('lock', 'Verouiller', 'lock()', ''),
            ActionBarButton::make('cancel', 'Annuler', 'cancel()', 'cancelled'),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['reception', 'invoice', 'send', 'lock']; // Adjust as needed

        // Change dynamicaly the display order depends on status
        return $this->sortActionButtons($buttons, $customOrder, $status);


    }

    // Status Bar Buttons
    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('request', 'Demande de prix', 'request'),
            StatusBarButton::make('sent', 'Envoyé', 'sent'),
            StatusBarButton::make('purchase_order', 'Bon de commande fournisseur', 'purchase_order'),
            StatusBarButton::make('canceled', 'Annulé', 'canceled')->component('button.status-bar.canceled'),
            // Add more buttons as needed
        ];
    }

    public function capsules() : array
    {
        return [
            Capsule::make('receipt', 'Réception', 'Les réceptions engendrées par cette commande.')->component('capsules.purchase.reception'),
            // Capsule::make('request', 'Demandes', 'Les demandes de prix ayant engendrés cette commande.')->component('capsules.purchase.quotation'),
            // Capsule::make('invoice', 'Factures', 'Les factures ayant été engendrées par cette commande.')->component('capsules.invoice.purchase-invoice'),
            // Add more buttons as needed
        ];
    }

    // Create a Bill from the purchase order
    public function createInvoice(){

        $purchase = $this->purchase;

        $invoice = Bill::create([
            'company_id' => $purchase->company_id,
            'purchase_id' => $purchase->id,
            'supplier_id' => $purchase->supplier_id,
            'date' => now(),
            'due_date' => $purchase->expected_date,
            'payment_term' => $purchase->payment_term,
            'payment_status' => 'unpaid',
            'buyer_id' => $purchase->buyer_id,
            'total_amount' => $purchase->total_amount * 100,
            'paid_amount' => $purchase->paid_amount * 100,
            'due_amount' => $purchase->due_amount * 100,
            'status' => 'draft',
            'to_checked' => false,
        ]);
        $invoice->save();

        $purchase->update([
            'invoice_status' => 'invoiced',
        ]);

        // $invoiceDetails = $invoice->invoiceDetails;
            $purchase_details = $purchase->purchaseDetails;

        foreach($purchase_details as $detail) {
            //Create purchase from quotation view without create quotation
            BillDetail::create([
                'supplier_bill_id' => $invoice->id,
                'product_id' => $detail->product_id,
                'label' => $detail->product_name,
                'product_name' => $detail->product_name,
                'quantity' => $detail->quantity,
                'price' => $detail->price * 100,
                'unit_price' => $detail->unit_price * 100,
                'sub_total' => $detail->sub_total * 100,
                'product_discount_amount' => $detail->product_discount_amount * 100,
                'product_discount_type' => $detail->product_discount_type,
                'product_tax_amount' => $detail->product_tax_amount * 100,
            ]);

        }

        Cart::instance('purchase')->destroy();

        return redirect()->route('purchases.invoices.show', ['subdomain' => current_company()->domain_name, 'purchase' => $purchase->id, 'invoice' => $invoice->id, 'menu' => current_menu()]);

    }



}
