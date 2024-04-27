<?php

namespace Modules\Purchase\Livewire\Form;

use Livewire\Component;
use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Capsule;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Inventory\Services\LogisticService;
use Modules\Sales\Services\QuotationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Modules\Contact\Entities\Contact;
use Modules\Purchase\Entities\Purchase;
use Modules\Purchase\Entities\PurchaseDetail;
use Modules\Purchase\Entities\Request\RequestQuotation;
use Modules\Purchase\Entities\Request\RequestQuotationDetail;
use Modules\Inventory\Entities\Operation\OperationTransfer;
use Modules\Inventory\Entities\Operation\OperationTransferDetail;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Inventory\Traits\OperationTransferTrait;

class RequestQuotationForm extends BaseForm
{
    use ActionBarButtonTrait;

    public $cartInstance = 'request-quotation';
    public $request;

    public $status = 'request';

    public bool $ask_confirmation = false;

    public $reference,
    $supplier,
    $supplier_reference,
    $date,
    $deadline_date,
    $expected_arrival_date,
    $reminder_date_before_receipt = 0,
    $buyer,
    $source_document,
    $tags = [],
    $payment_term,
    $fiscal_position,

    $term;

    public $total_amount = 0,
    $paid_amount = 0,
    $due_amount = 0,
    $tax_percentage = 18.9,
    $tax_amount = 0,
    $discount_percentage = 0,
    $discount_amount = 0,
    $shipping_amount = 0;
    // public $qty = 1;


    public $updateMode = false;


    public $isModified = false;
    public function mount ($request = null){
        if($request){

            // $this->updateMode = true;

            $this->request = $request;

            $this->status = $request->status;

            $this->reference = $request->reference;
            $this->supplier = $request->supplier_id;
            $this->supplier_reference = Contact::findOrFail($request->supplier_id)->reference;
            $this->date = $request->date;
            $this->deadline_date = $request->deadline_date;
            $this->expected_arrival_date = $request->expected_arrival_date;
            $this->ask_confirmation = $request->ask_confirmation;
            $this->reminder_date_before_receipt = $request->reminder_date_before_receipt;
            // Purchase
            $this->buyer = $request->buyer_id;
            $this->source_document = $request->source_document;
            $this->tags = $request->tags;
            // Invoicing
            $this->payment_term = $request->payment_term;
            $this->fiscal_position = $request->fiscal_position_id;


            // Update the cart
            $request_details = $request->RequestQuotationDetails;

            Cart::instance('request-quotation')->destroy();

            $cart = Cart::instance('request-quotation');

            foreach ($request_details as $request_detail) {
                $cart->add([
                    'id'      => $request_detail->product_id,
                    'name'    => $request_detail->product_name,
                    'qty'     => $request_detail->quantity,
                    'price'   => $request_detail->price,
                    'weight'  => 1,
                    'options' => [
                        'description'  => $request_detail->product->description,
                        'product_discount' => $request_detail->product_discount_amount,
                        'product_discount_type' => $request_detail->product_discount_type,
                        'sub_total'   => $request_detail->sub_total,
                        'code'        => $request_detail->product_code,
                        'stock'       => Product::findOrFail($request_detail->product_id)->product_quantity,
                        'product_tax' => $request_detail->product_tax_amount,
                        'unit_price'  => $request_detail->unit_price
                    ]
                ]);
            }
        }else{
            $this->date = now()->format('Y-m-d H:i:s');
            $this->deadline_date = now()->format('Y-m-d H:i:s');
            $this->expected_arrival_date = now()->format('Y-m-d H:i:s');
            $this->payment_term = 'immediate_payment';
            // Buyer
            $this->buyer = Contact::isCompany(current_company()->id)->first()->id;
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
            Input::make('supplier_id','Fournisseur', 'select', 'supplier', 'left', 'none', 'none')->component('inputs.select.contact'),
            Input::make('supplier_reference','Référence Fournisseur', 'text', 'supplier_reference', 'left', 'none', 'none'),
            // Input::make('date',"Date", 'date', 'date', 'right', 'none', 'none')->component('inputs.date.complete_readonly'),
            Input::make('deadline_date',"Echéance", 'datetime-local', 'deadline_date', 'right', 'none', 'none'),
            Input::make('expected_arrival_date','Livraison prévue', 'datetime-local', 'expected_arrival_date', 'right', 'none', 'none'),
            Input::make('ask_confirmation','Demande de confirmation', 'checkbox', 'ask_confirmation', 'right', 'none', 'none')->component('inputs.ask-confirmation'),

            // Purchase
            Input::make('buyer_id','Acheteur', 'select', 'buyer', '', 'other', 'purchases')->component('inputs.select.contact'),
            Input::make('source_document',"Document d'origine", 'text', 'source_document', '', 'other', 'purchases'),
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
            Tabs::make('purchase','Produits')->component('tabs.purchase-request'),
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
            ActionBarButton::make('send', 'Envoyer par Email', 'sendByEmail()', 'request'),
            ActionBarButton::make('print', 'Imprimer', 'confirmQT()', 'request'),
            ActionBarButton::make('confirm', 'Comfirmer la commande', $this->request ? 'confirmQT()': 'storePO()', 'sent'),
            ActionBarButton::make('cancel', 'Annuler', 'cancel()', 'cancelled'),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['confirm', 'send', 'preview']; // Adjust as needed

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
            // Capsule::make('sale', 'Vente(s)', 'Les ventes générées via le devis.'),
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

    #[On('create-request')]
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
                'total_amount' => $this->total_amount,
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
                    'product_code' => '['.$cart_item->options->code.']',
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

    #[On('update-request')]
    public function updateRequest(){
        // $this->validate();
            $request = $this->request;
            $request->update([
                // 'company_id' => current_company()->id,
                'supplier_id' => $this->supplier,
                'deadline_date' => $this->deadline_date,
                // 'date' => $this->date,
                'expected_arrival_date' => $this->expected_arrival_date,
                'ask_confirmation' => $this->ask_confirmation,
                'reminder_date_before_receipt' => $this->reminder_date_before_receipt,
                'supplier_reference' => $this->supplier_reference,
                'buyer_id' => $this->buyer,
                'source_document' => $this->source_document,
                'payment_term' => $this->payment_term,
                'fiscal_position_id' => $this->fiscal_position,
                // 'terms' => $this->terms,
                // 'total_amount' => $this->total_amount,
                // 'status' => $this->status,
                // 'tax_amount' => $this->tax_amount,
                // 'discount_amount' => $this->discount_amount,
                // 'tax_percentage' => $this->tax_percentage,
                // 'discount_percentage' => $this->discount_percentage,
            ]);

            // foreach (Cart::instance('request-quotation')->content() as $cart_item) {
            //     RequestQuotationDetail::create([
            //         'request_quotation_id' => $request->id,
            //         'product_id' => $cart_item->id,
            //         'product_name' => $cart_item->name,
            //         'product_code' => '['.$cart_item->options->code.']',
            //         'quantity' => $cart_item->qty,
            //         'price' => $cart_item->price * 100,
            //         'unit_price' => $cart_item->options->unit_price * 100,
            //         'sub_total' => $cart_item->options->sub_total * 100,
            //         'product_discount_amount' => $cart_item->options->product_discount * 100,
            //         'product_discount_type' => $cart_item->options->product_discount_type,
            //         'product_tax_amount' => $cart_item->options->product_tax * 100,
            //     ]);
            // }

            // // Cart::instance('request-quotation')->store(Auth::user()->id);
            // Cart::instance('request-quotation')->destroy();

            // if($request->supplier_reference){
            //     $contact = Contact::findOrFail($request->supplier_id);
            //     if($contact->reference == null){
            //         $contact->reference = $request->supplier_reference;
            //         $contact->save();
            //     }
            // }

            notify()->success("Nouvelle demande de Devis créée !");

            return redirect()->route('purchases.requests.show', ['subdomain' => current_company()->domain_name, 'request' => $request->id, 'menu' => current_menu()]);
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
                // 'source_document' => $this->reference,
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
                // 'delivery_status' => 'Pending',
                'reception_status' => 'Pending',
                'invoice_status' => 'to_invoice',
                'total_amount' => $this->total_amount,
                'paid_amount' => $this->paid_amount,
                'due_amount' => $this->total_amount, //$due_amount
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

            // Launch Logistics reception
            $purchaseService = new LogisticService();
            $purchaseService->launchReception($purchase);


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

            return redirect()->route('purchases.show', ['subdomain' => current_company()->domain_name, 'purchase' => $purchase->id, 'menu' => current_menu()]);
        });
    }

    public function confirmQT(){
        $this->validate();
        $request = $this->request;

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
                'source_document' => $this->source_document,
                'expected_arrival_date' => $this->expected_arrival_date,
                'ask_confirmation' => $this->ask_confirmation,
                'reminder_date_before_receipt' => $this->reminder_date_before_receipt,
                'supplier_reference' => $this->supplier_reference,
                'buyer_id' => $this->buyer,
                'payment_term' => $this->payment_term,
                'fiscal_position_id' => $this->fiscal_position,
                // 'terms' => $this->terms,
                'payment_status' => $payment_status,
                // 'delivery_status' => 'Pending',
                'reception_status' => 'Pending',
                'invoice_status' => 'to_invoice',
                'total_amount' => $this->total_amount,
                'paid_amount' => $this->paid_amount,
                'due_amount' => $this->total_amount, //$due_amount
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
            // Launch Logistics reception
            $purchaseService = new LogisticService();
            $purchaseService->launchReception($purchase);

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

            return redirect()->route('purchases.show', ['subdomain' => current_company()->domain_name, 'purchase' => $purchase->id, 'menu' => current_menu()]);
        });
    }

    public function askConfirmation(){
        $this->ask_confirmation = true;
    }

}
