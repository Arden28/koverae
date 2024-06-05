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
use Carbon\Carbon;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Inventory\Services\LogisticService;
use Modules\Sales\Services\QuotationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Modules\App\Entities\Email\EmailTemplate;
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

    // Request For Quotation Cart
    public $inputs = [];


    public $updateMode = false;


    public $template, $model;

    public function mount ($request = null){
        if($request){

            // $this->updateMode = true;

            $this->request = $request;

            $this->status = $request->status;
            $this->model = $this->request;
            $this->template = EmailTemplate::isCompany(current_company()->id)->applyTo('quotation')->first()->id;

            $this->reference = $request->reference;
            $this->supplier = $request->supplier_id;
            $this->supplier_reference = Contact::findOrFail($request->supplier_id)->reference;
            $this->date = $request->date;
            $this->deadline_date = Carbon::parse($request->deadline_date)->format('Y-m-d H:i:s');
            $this->expected_arrival_date = Carbon::parse($request->expected_arrival_date)->format('Y-m-d H:i:s');
            $this->ask_confirmation = $request->ask_confirmation;
            $this->reminder_date_before_receipt = $request->reminder_date_before_receipt;
            // Purchase
            $this->buyer = $request->buyer_id;
            $this->source_document = $request->source_document;
            $this->tags = $request->tags;
            // Invoicing
            $this->payment_term = $request->payment_term;
            $this->fiscal_position = $request->fiscal_position_id;

            // Block the field
            $this->blocked = true;

        }else{
            $this->date = now()->format('Y-m-d H:i:s');
            $this->deadline_date = now()->format('Y-m-d H:i:s');
            $this->expected_arrival_date = now()->addDays(7)->format('Y-m-d H:i:s');
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

    #[On('rfq-cart')]
    public function updateInputs($inputs, $total, $totalHT){
        $this->inputs = $inputs;
        $this->total_amount = $total;
    }

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
            ActionBarButton::make('send', 'Envoyer par Email', '', 'request')->component('button.action-bar.send-email'),
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
                'total_amount' => $this->total_amount * 100,
                'status' => $this->status,
                'tax_amount' => $this->tax_amount,
                'discount_amount' => $this->discount_amount,
                'tax_percentage' => $this->tax_percentage,
                'discount_percentage' => $this->discount_percentage,
            ]);

            foreach ($this->inputs as $detail) {
                RequestQuotationDetail::create([
                    'request_quotation_id' => $request->id,
                    'product_id' => $detail['product'],
                    'description' => $detail['description'],
                    'product_name' => Product::find( $detail['product'] )->product_name,
                    'product_code' => Product::find( $detail['product'] )->product_code ?? '',
                    'quantity' => $detail['quantity'],
                    'price' => $detail['price'] * 100,
                    'unit_price' => $detail['price'] * 100,
                    'sub_total' => $detail['subtotal'] * 100,
                    'product_discount_amount' => 0,
                    'product_discount_type' => 'fixed',
                    'product_tax_amount' => 0,
                ]);
            }

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

            foreach ($request->RequestQuotationDetails as $request_detail) {
                $request_detail->delete();
            }

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
                'total_amount' => $this->total_amount,
                'status' => $this->status,
                'tax_amount' => $this->tax_amount,
                'discount_amount' => $this->discount_amount,
                'tax_percentage' => $this->tax_percentage,
                'discount_percentage' => $this->discount_percentage,
            ]);
            $request->save();

            foreach($this->inputs as $detail){
                RequestQuotation::create([
                    'quotation_id' => $request->id,
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
            }

            notify()->success("Nouvelle demande de Devis créée !");

            return redirect()->route('purchases.requests.show', ['subdomain' => current_company()->domain_name, 'request' => $request->id, 'menu' => current_menu()]);
    }

    public function sendByEmail(){
        $this->status == 'sent';
        $this->storeRequest();
    }

    public function storePO(){
        // $this->validate();

            $due_amount = $this->total_amount - $this->paid_amount;

            if ($due_amount == $this->total_amount) {
                $payment_status = 'unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'partial';
            } else {
                $payment_status = 'paid';
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
                'paid_amount' => 0,
                'due_amount' => $this->total_amount * 100, //On va remplacer cela par le prix TTC
                'total_amount' => $this->total_amount * 100,
                'status' => 'purchase_order',
                // 'terms' => $this->note,
                'tax_amount' => $this->tax_amount * 100,
                'discount_amount' => $this->discount_amount * 100,
                'tax_percentage' => $this->tax_percentage,
                'discount_percentage' => $this->discount_percentage,
            ]);

            foreach ($this->inputs as $detail) {
                PurchaseDetail::create([
                    'purchase_id' => $purchase->id,
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
                    'received' => 0,
                    'invoiced' => 0,
                ]);
            }
            if(module('inventory')){
                // Launch Logistics reception
                $purchaseService = new LogisticService();
                $purchaseService->launchReception($purchase);
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

            return redirect()->route('purchases.show', ['subdomain' => current_company()->domain_name, 'purchase' => $purchase->id, 'menu' => current_menu()]);

    }

    public function confirmQT(){
        $this->validate();

        $due_amount = $this->total_amount - $this->paid_amount;

        if ($due_amount == $this->total_amount) {
            $payment_status = 'unpaid';
        } elseif ($due_amount > 0) {
            $payment_status = 'partial';
        } else {
            $payment_status = 'paid';
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
            'reception_status' => 'pending',
            'invoice_status' => 'to_invoice',
            'total_amount' => $this->total_amount * 100,
            'paid_amount' => $this->paid_amount * 100,
            'due_amount' => $this->total_amount * 100, //$due_amount
            'status' => 'purchase_order',
            'tax_amount' => $this->tax_amount,
            'discount_amount' => $this->discount_amount,
            'tax_percentage' => $this->tax_percentage,
            'discount_percentage' => $this->discount_percentage,
        ]);

        foreach ($this->request->RequestQuotationDetails as $detail) {
            PurchaseDetail::create([
                'purchase_id' => $purchase->id,
                'product_id' => $detail->product_id,
                'product_name' => $detail->product_name,
                'product_code' => $detail->product_code,
                'quantity' => $detail->quantity,
                'price' => $detail->price * 100,
                'unit_price' => $detail->price * 100,
                'sub_total' => $detail->sub_total * 100,
                'product_discount_amount' => 0,
                // 'product_discount_type' => $detail->options->product_discount_type,
                'product_tax_amount' => 0,
                'received' => 0,
                'invoiced' => 0,
            ]);
        }
        if(module('inventory')){
            // Launch Logistics reception
            $purchaseService = new LogisticService();
            $purchaseService->launchReception($purchase);
        }

        if($purchase->supplier_reference){
            $contact = Contact::findOrFail($purchase->supplier_id);
            if($contact->reference == null){
                $contact->reference = $purchase->supplier_reference;
                $contact->save();
            }
        }

        notify()->success("Nouvelle commande créée !");

        return redirect()->route('purchases.show', ['subdomain' => current_company()->domain_name, 'purchase' => $purchase->id, 'menu' => current_menu()]);

    }

    public function askConfirmation(){
        $this->ask_confirmation = true;
    }

    // Cancel the order
    public function cancelOrder(){
        $this->request->update([
            'status' => 'cancelled',
        ]);
        $this->status == 'cancelled';
    }

}