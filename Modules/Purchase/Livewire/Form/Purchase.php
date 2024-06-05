<?php

namespace Modules\Purchase\Livewire\Form;

use Livewire\Component;
use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Capsule;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Sales\Services\QuotationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Contact\Entities\Contact;
use Modules\Purchase\Entities\PurchaseForm;
use Modules\Purchase\Entities\PurchaseDetail;
use Modules\Purchase\Entities\Request\RequestQuotation;
use Modules\Purchase\Entities\Request\RequestQuotationDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\Employee\Entities\Employee;
use Modules\Invoicing\Entities\Vendor\Bill;
use Modules\Invoicing\Entities\Vendor\BillDetail;

class Purchase extends BaseForm
{
    use ActionBarButtonTrait;

    public $cartInstance = 'purchase';
    public $purchase;

    // public $status = 'purchase_order';

    public $invoice;

    public $reference,
    $supplier,
    $supplier_reference,
    $date,
    $deadline_date,
    $expected_arrival_date,
    $ask_confirmation = false,
    $reminder_date_before_receipt = 0,

    $buyer,
    $source_document,
    $tags = [],

    $payment_term,
    $fiscal_position,

    $term,
    $status;

    public $total_amount = 0,
    $paid_amount = 0,
    $due_amount = 0,
    $tax_percentage = 18.9,
    $tax_amount = 0,
    $discount_percentage = 0,
    $discount_amount = 0,
    $shipping_amount = 0;
    public $qty = 1;


    public $updateMode = false;


    // public $isModified = false;
    public function mount ($purchase = null){
        if($purchase){

            $this->updateMode = true;

            $this->purchase = $purchase;

            $this->status = $purchase->status;

            $this->invoice = $purchase->invoice;

            $this->reference = $purchase->reference;
            $this->supplier = $purchase->supplier_id;
            $this->supplier_reference = Contact::findOrFail($purchase->supplier_id)->reference;
            $this->date = Carbon::parse($purchase->date)->format('Y-m-d H:i:s');
            $this->deadline_date = Carbon::parse($purchase->deadline_date)->format('Y-m-d H:i:s');
            $this->expected_arrival_date = Carbon::parse($purchase->expected_arrival_date)->format('Y-m-d H:i:s');
            $this->ask_confirmation = $purchase->ask_confirmation;
            $this->reminder_date_before_receipt = $purchase->reminder_date_before_receipt;
            // Purchase
            $this->buyer = $purchase->buyer_id;
            $this->source_document = $purchase->source_document;
            $this->tags = $purchase->tags;
            // Invoicing
            $this->payment_term = $purchase->payment_term;
            $this->fiscal_position = $purchase->fiscal_position_id;


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
    }

    protected $rules= [
        'supplier' => 'required',
        'supplier_reference' => 'nullable',
        'date' => 'required',
        'deadline_date' => 'required',
        'expected_arrival_date' => 'nullable',
        'ask_confirmation' => 'nullable',
        'reminder_date_before_receipt' => 'nullable|integer',
        // Purchase
        'buyer' => 'required',
        'source_document' => 'nullable',
        'tags' => 'nullable',

        // Invoicing
        'payment_term' => 'required',
        'fiscal_position' => 'nullable',

    ];

    public function updatedSupplier($value)
    {
        $contact = Contact::findOrFail($value);
        // Update $supplier_reference when $supplier changes
        $this->supplier_reference = $contact->reference;

        // You can also perform additional logic or queries here if needed
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('supplier_id','Fournisseur', 'select', 'supplier', 'left', 'none', 'none')->component('inputs.select.readonly.contact'),
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

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('purchase','Produits')->component('tabs.purchase'),
            Tabs::make('other','Autres Informations'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('purchases','Achat', 'other'),
            Group::make('invoicing','Facturation', 'other'),
        ];
    }

    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            ActionBarButton::make('reception', 'Recevoir les produits', 'receiveOrder()', 'purchase_order'),
            ActionBarButton::make('invoice', 'Créer une facture fournisseur', 'createInvoice', 'purchase_order'),
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
            Capsule::make('invoice', 'Facture(s)', 'Factures du bon de commande.')->component('capsules.purchase-invoice-capsule'),
            // Add more buttons as needed
        ];
    }


    public function actionButtons() : array
    {
        return [
            ActionButton::make('print', 'Imprimer', 'print'),
            ActionButton::make('duplicate', 'Dupliquer', 'duplicate'),
            ActionButton::make('delete', 'Supprimer', 'delete'),
            // Add more buttons as needed
        ];
    }

    public function form() : string
    {
        if($this->updateMode == true){
            return 'updateRequest({{ $request->id }})';
        }else{

        }
        return 'storeRequest()';
    }

    public function storeRequest(){
        // $this->validate();

        DB::transaction(function () {
            $cart = Cart::instance('request-quotation');
            // Remove any non-numeric characters except the decimal point
            $this->total_amount = convertToInt($cart->total());
            $this->tax_amount = convertToInt($cart->tax());

            $request = RequestQuotation::create([
                'company_id' => current_company()->id,
                'supplier_id' => $this->supplier,
                'deadline_date' => $this->deadline_date,
                'date' => now(),
                'expected_arrival_date' => $this->expected_arrival_date,
                'ask_confirmation' => $this->ask_confirmation,
                'reminder_date_before_receipt' => $this->reminder_date_before_receipt,
                'supplier_reference' => $this->supplier_reference,
                'buyer_id' => $this->buyer,
                'source_document' => $this->source_document,
                'payment_term' => $this->payment_term,
                'fiscal_position_id' => $this->fiscal_position,
                // 'terms' => $this->terms,
                'total_amount' => $this->total_amount / 100,
                'status' => $this->status,
                'tax_amount' => $this->tax_amount,
                'discount_amount' => $this->discount_amount,
                'tax_percentage' => $this->tax_percentage,
                'discount_percentage' => $this->discount_percentage,
            ]);

            foreach (Cart::instance('request-quotation')->content() as $cart_item) {
                RequestQuotationDetail::create([
                    'request_quotation_id' => $request->id,
                    'product_id' => $cart_item->id,
                    'product_name' => $cart_item->name,
                    'product_code' => $cart_item->options->code,
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->options->sub_total * 100,
                    'product_discount_amount' => $cart_item->options->product_discount * 100,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                    'product_tax_amount' => $cart_item->options->product_tax * 100,
                ]);
            }

            // Cart::instance('request-quotation')->store(Auth::user()->id);
            Cart::instance('request-quotation')->destroy();

            if($request->supplier_reference){
                $contact = Contact::findOrFail($request->supplier_id);
                if($contact->reference == null){
                    $contact->reference = $request->supplier_reference;
                    $contact->save();
                }
            }
            notify()->success("Nouvelle demande de Devis créée !");

            return redirect()->route('purchases.requests.show', ['subdomain' => current_company()->domain_name, 'request' => $request->id, 'menu' => current_menu()]);
        });
    }

    public function sendByEmail(){
        $this->status == 'sent';
        $this->storeRequest();
    }

    public function storePO(){
                // $this->validate();

        DB::transaction(function () {
            $cart = Cart::instance('request-quotation');
            // Remove any non-numeric characters except the decimal point
            $this->total_amount = convertToInt($cart->total());
            $this->tax_amount = convertToInt($cart->tax());

            $due_amount = $this->total_amount - $this->paid_amount;

            if (isset($this->payment_method)) {
                // Access the payment_method key
                $paymentMethod = $this->payment_method;
            } else {
                // Set a default value for payment_method
                $paymentMethod = 'Cash';
            }
            if ($due_amount == $this->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            $purchase = Purchase::create([
                'company_id' => current_company()->id,
                'supplier_id' => $this->supplier,
                'deadline_date' => $this->deadline_date,
                'date' => now(),
                'expected_arrival_date' => $this->expected_arrival_date,
                'ask_confirmation' => $this->ask_confirmation,
                'reminder_date_before_receipt' => $this->reminder_date_before_receipt,
                'supplier_reference' => $this->supplier_reference,
                'buyer_id' => $this->buyer,
                'source_document' => $this->source_document,
                'payment_term' => $this->payment_term,
                'fiscal_position_id' => $this->fiscal_position,
                // 'terms' => $this->terms,
                'payment_status' => $payment_status,
                'delivery_status' => 'Pending',
                'reception_status' => 'Pending',
                'invoice_status' => 'Pending',
                'total_amount' => $this->total_amount / 100,
                'paid_amount' => $this->paid_amount / 100,
                'due_amount' => $this->total_amount / 100, //$due_amount
                'status' => 'purchase_order',
                'tax_amount' => $this->tax_amount,
                'discount_amount' => $this->discount_amount,
                'tax_percentage' => $this->tax_percentage,
                'discount_percentage' => $this->discount_percentage,
            ]);

            foreach (Cart::instance('request-quotation')->content() as $cart_item) {
                PurchaseDetail::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $cart_item->id,
                    'product_name' => $cart_item->name,
                    'product_code' => $cart_item->options->code,
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->options->sub_total * 100,
                    'product_discount_amount' => $cart_item->options->product_discount * 100,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                    'product_tax_amount' => $cart_item->options->product_tax * 100,
                    'received' => 0,
                    'invoiced' => 0,
                ]);
            }

            // Cart::instance('request-quotation')->store(Auth::user()->id);
            Cart::instance('request-quotation')->destroy();

            if($purchase->supplier_reference){
                $contact = Contact::findOrFail($purchase->supplier_id);
                if($contact->reference == null){
                    $contact->reference = $purchase->supplier_reference;
                    $contact->save();
                }
            }

            notify()->success("Nouvelle commande créée !");

            return $this->redirect(route('purchases.show', ['subdomain' => current_company()->domain_name, 'purchase' => $purchase->id]), navigate:true);
        });
    }

    public function askConfirmation(){
        // $this->ask_confirmation == true
    }

    // Create Invoice
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

        return redirect()->route('purchases.invoices.show', ['subdomain' => current_company()->domain_name, 'purchase' => $purchase->id, 'invoice' => $invoice->id]);

    }


    // Print Purchase
    public function print(){
        try {
            // $purchase = Quotation::find(38);

            if (!$this->purchase) {
                throw new \Exception('purchase not found');
            }

            $purchase = Purchase::findOrFail($this->purchase->id);

            $customer = Contact::findOrFail($purchase->supplier_id);
            $buyer = Employee::findOrFail($purchase->buyer_id);
            $company = current_company();

            $pdf = Pdf::loadView('purchase::print-purchase-order', [
                'purchase' => $purchase,
                'customer' => $customer,
                'buyer' => $buyer,
                'company' => $company
            ])->setPaper('a4');

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output(); // Echo download contents directly...
            }, 'Bon de commande fournisseur -' . $purchase->reference . '.pdf');


            // return response($utf8Output)->download('purchase-' . $purchase->reference . '.pdf');
        } catch (\Exception $e) {
            Log::error('Error generating purchase PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }
}