<?php

namespace Modules\Sales\Livewire\Form;

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
use Modules\Sales\Services\QuotationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Modules\Sales\Entities\Quotation\Quotation;
use Modules\Sales\Entities\Quotation\QuotationDetails;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Contact\Entities\Contact;

use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesDetail;
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeam;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\App\Entities\Email\EmailTemplate;
use Modules\Inventory\Entities\Operation\OperationTransfer;
use Modules\Inventory\Entities\Operation\OperationTransferDetail;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Inventory\Services\LogisticService;
use Modules\Inventory\Traits\OperationTransferTrait;
use Modules\Invoicing\Entities\Tax\Tax;

class QuotationForm extends BaseForm
{
    use ActionBarButtonTrait, OperationTransferTrait;

    public $quotation;

    public $customer,

    $date,

    $expected_date,

    $payment_term, $reference, $tax_percentage = 18.9, $tax_amount = 0, $discount_percentage = 0, $discount_amount = 0, $shipping_amount = 0, $paid_amount = 0, $due_amount = 0, $total_amount = 0, $payment_method = 'Cash', $payment_status, $status = 'quotation', $note,

    $seller,

    $sellers = [],

    $sales_team,

    $sales_teams = [],

    $tags,

    $shipping_policy,

    $shipping_date,

    $shipping_status;

    public $updateMode = false;

    public $customer_name;

    public $qty = 1;

    private $quotationService;

    public $sale;

    public $model;
    public $template;

    // Quotation Cart
    public $inputs = [];


    public function mount($quotation = null){
        if($quotation){

            $this->quotation = $quotation;

            $this->model = $quotation;
            // $this->template = EmailTemplate::isCompany(current_company()->id)->applyTo('quotation')->first()->id;

            $this->sale = $quotation->sale;

            $this->customer = $quotation->customer_id;
            $this->customer_name = Contact::findOrFail($quotation->customer_id)->name;
            $this->date = Carbon::parse($quotation->date)->format('Y-m-d');
            $this->expected_date = $quotation->expected_date;
            $this->payment_term = $quotation->payment_term;
            $this->reference = $quotation->reference;
            $this->tax_percentage = $quotation->tax_percentage;
            $this->tax_amount = $quotation->tax_amount;
            $this->discount_percentage = $quotation->discount_percentage;
            $this->shipping_amount = $quotation->shipping_amount;
            $this->total_amount = $quotation->total_amount;
            $this->status = $quotation->status;
            $this->note = $quotation->note;
            $this->seller = $quotation->seller_id;
            $this->sales_team = $quotation->sales_team_id;
            $this->tags = $quotation->tags;
            $this->shipping_date = $quotation->shipping_date;
            $this->shipping_policy = $quotation->shipping_policy;
            $this->shipping_status = $quotation->shipping_status;
            // Order Details
            // $this->inputs = $quotation->quotationDetails;

            // Block the field
            $this->blocked = true;
        }else{
            $this->reference = "Nouveau";
            $this->date = now()->format('Y-m-d');
            $this->expected_date = now()->addDays(7)->format('Y-m-d');
            $this->payment_term = 'immediate_payment';
            $this->sales_team = SalesTeam::isCompany(current_company()->id)->first()->id;
            $this->shipping_policy = 'as_soon_as_possible';
            $this->shipping_date = now()->addDays(7)->format('Y-m-d');
            $this->shipping_status = 'undelivered';
        }
    }

    protected $rules = [
        'customer' => 'required',
        'date' => 'required',
        'expected_date' => 'nullable',
        'payment_term' => 'required',
        'tax_percentage' => 'nullable|integer|min:0|max:100',
        'discount_percentage' => 'nullable|integer|min:0|max:100',
        'shipping_amount' => 'nullable|numeric',
        // 'total_amount' => 'required|gt:0',
        'status' => 'nullable|string|max:255',
        'note' => 'nullable|string|max:1000',
        'seller' => 'nullable',
        'sales_team' => 'nullable',
        'tags' => 'nullable',
        'shipping_policy' => 'nullable',
        'shipping_date' => 'nullable',
        'shipping_status' => 'nullable|string',
        // 'inputs' => 'required'
    ];

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('customer','Client', 'select', 'customer', 'left', 'none', 'none')->component('inputs.select.contact'),
            Input::make('date','Date', 'date', 'date', 'right', 'none', 'none'),
            Input::make('expiration','Expiration', 'date', 'expected_date', 'right', 'none', 'none'),
            Input::make('payment_term','Modalité de paiement', 'select', 'payment_term', 'right', 'none', 'none')->component('inputs.select.payment_term'),

            //Note
            Input::make('note','Modalité de paiement', 'textarea', 'note', '', 'summary', 'none', 'Note interne')->component('inputs.textarea.tabs-middle'),

            // Sales
            Input::make('salesTeams','Equipe de vente', 'select', 'sales_team', '', 'other', 'sales')->component('inputs.select.sales_teams'),
            Input::make('seller','Commercial(e)', 'select', 'seller', '', 'other', 'sales')->component('inputs.select.sales.seller'),
            Input::make('tags','Tag(s)', 'select', 'tags', '', 'other', 'sales')->component('inputs.select.sales.tags'),

            // Shipping
            Input::make('shipping_policy','Politique de livraison', 'select', 'shipping_policy', '', 'other', 'delivery')->component('inputs.select.shipping.policy'),
            Input::make('shipping_date','Date de livraison', 'date', 'shipping_date', '', 'other', 'delivery'),
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
            Tabs::make('order','Commande')->component('tabs.quotation-order'),
            Tabs::make('other','Autres Informations'),
            Tabs::make('summary','Note')->component('tabs.note.summary'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('sales','Ventes', 'other'),
            Group::make('delivery','Livraison', 'other'),
            Group::make('invoicing','Facturation', 'other'),
            Group::make('tracking','Suivi', 'other'),
        ];
    }

    public function actionBarButtons() : array
    {
        $status = $this->status;

        $buttons = [
            // key, label, action, primary
            // ActionBarButton::make('invoice', 'Créer une facture', 'storeQT()', 'sale_order'),
            ActionBarButton::make('send', 'Envoyer par Email', "", 'quotation')->component('button.action-bar.send-email'),
            ActionBarButton::make('confirm', 'Confirmer', 'confirm', 'sent')->component('button.action-bar.confirmed-quotation'),
            ActionBarButton::make('preview', 'Aperçu', 'preview()', 'previewed'),
            ActionBarButton::make('unlock',  $this->blocked ? 'Débloquer' : 'Bloquer', $this->blocked ? "unlock()" : "lock()", 'confirmed'),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['invoice', 'confirm', 'send', 'preview', 'unlock']; // Adjust as needed

        // Change dynamicaly the display order depends on status
        return $this->sortActionButtons($buttons, $customOrder, $status);


    }

    public function statusBarButtons() : array
    {
        return [
            StatusBarButton::make('quotation', 'Devis', 'quotation'),
            StatusBarButton::make('sent', 'Envoyé', 'sent'),
            StatusBarButton::make('sale_order', 'Bon de commande', 'sale_order'),
            StatusBarButton::make('canceled', 'Annulé', 'canceled')->component('button.status-bar.canceled'),
            // Add more buttons as needed
        ];
    }

    public function capsules() : array
    {
        return [
            Capsule::make('sale', 'Bons de commande', 'Les ventes générées via le devis.')->component('capsules.sale-capsule'),
            // Add more buttons as needed
        ];
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('print', '<i class="bi bi-printer"></i> Imprimer', 'print()'),
            ActionButton::make('duplicate', 'Dupliquer', 'duplicate'),
            ActionButton::make('delete', 'Supprimer', 'delete'),
            // Add more buttons as needed
        ];
    }

    #[On('quotation-cart')]
    public function updateInputs($inputs, $total, $totalHT){
        $this->inputs = $inputs;
        $this->total_amount = $total;
    }

    public function form() : string
    {
        return 'storeQT()';
    }

    #[On('create-quotation')]
    // Store quotation
    public function storeQT(){

        // $this->validate();

        $quotation = Quotation::create([

            'company_id' => current_company()->id,
            'date' => $this->date,
            'expected_date' => $this->expected_date,
            'payment_term' => $this->payment_term,
            'seller_id' => $this->seller ?? 1, //customer id
            'sales_team_id' => $this->sales_team, //customer id
            'customer_id' => $this->customer, //customer id
            'tax_percentage' => $this->tax_percentage,
            'discount_percentage' => $this->discount_percentage,
            'shipping_amount' => 0,
            'shipping_date' => $this->shipping_date,
            'shipping_policy' => $this->shipping_policy,
            // 'shipping_status' => $this->shipping_status,
            'total_amount' => $this->total_amount * 100,
            'status' => $this->status,
            'note' => $this->note,
            // 'tax_amount' => $this->tax_amount / 100,
            // 'discount_amount' => $this->discount_amount / 100,
        ]);

        foreach($this->inputs as $detail){
            QuotationDetails::create([
                'quotation_id' => $quotation->id,
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

        notify()->success("Nouveau Devis créé !");

        return redirect()->route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $quotation->id, 'menu' => current_menu()]);

        // DB::transaction(function () {
        //     $cart = Cart::instance('quotation');
        //     // Remove any non-numeric characters except the decimal point
        //     $this->total_amount = convertToInt($cart->total());
        //     $this->tax_amount = convertToInt($cart->tax());

        //     $quotation = Quotation::create([

        //         'company_id' => current_company()->id,
        //         'date' => $this->date,
        //         'expected_date' => $this->expected_date,
        //         'payment_term' => $this->payment_term,
        //         'seller_id' => $this->seller ?? 1, //customer id
        //         'sales_team_id' => $this->sales_team, //customer id
        //         'customer_id' => $this->customer, //customer id
        //         'tax_percentage' => $this->tax_percentage,
        //         'discount_percentage' => $this->discount_percentage,
        //         'shipping_amount' => 0,
        //         'shipping_date' => $this->shipping_date,
        //         'shipping_policy' => $this->shipping_policy,
        //         // 'shipping_status' => $this->shipping_status,
        //         'total_amount' => $this->total_amount / 100,
        //         'status' => $this->status,
        //         'note' => $this->note,
        //         'tax_amount' => $this->tax_amount / 100,
        //         'discount_amount' => $this->discount_amount / 100,
        //     ]);

        //     foreach (Cart::instance('quotation')->content() as $cart_item) {
        //         QuotationDetails::create([
        //             'quotation_id' => $quotation->id,
        //             'product_id' => $cart_item->id,
        //             'product_name' => $cart_item->name,
        //             'product_code' => $cart_item->options->code,
        //             'quantity' => $cart_item->qty,
        //             'price' => $cart_item->price * 100,
        //             'unit_price' => $cart_item->options->unit_price * 100,
        //             'sub_total' => $cart_item->options->sub_total * 100,
        //             'product_discount_amount' => $cart_item->options->product_discount * 100,
        //             'product_discount_type' => $cart_item->options->product_discount_type,
        //             'product_tax_amount' => (Tax::find($cart_item->options->product_tax)->first()->amount * $cart_item->price) * 100,
        //         ]);
        //     }

        //     // Cart::instance('quotation')->store(Auth::user()->id);
        //     Cart::instance('quotation')->destroy();

        //     notify()->success("Nouveau Devis créé !");

        //     return redirect()->route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $quotation->id, 'menu' => current_menu()]);
        // });

    }

    // Update Quotation
    #[On('update-quotation')]
    public function updateQT(){

        $quotation = $this->quotation;

        foreach ($quotation->quotationDetails as $quotation_detail) {
            $quotation_detail->delete();
        }

        $quotation->update([

            // 'company_id' => current_company()->id,
            'date' => $this->date,
            'expected_date' => $this->expected_date,
            'payment_term' => $this->payment_term,
            'seller_id' => $this->seller, //customer id
            'sales_team_id' => $this->sales_team, //customer id
            'customer_id' => 1, //customer id
            'tax_percentage' => $this->tax_percentage, //tax percentage
            'discount_percentage' => $this->discount_percentage, //discount percentage
            'discount_amount' => $this->discount_amount ?? 0, //discount percentage
            'shipping_amount' => $this->shipping_amount,
            'shipping_date' => $this->shipping_date,
            'shipping_policy' => $this->shipping_policy,
            'shipping_status' => $this->shipping_status,
            'total_amount' => convertToInt(Cart::instance('quotation')->total()) / 100,
            'status' => $this->status,
            'note' => $this->note,
            'tax_amount' => $this->tax_amount,
            'discount_amount' => $this->discount_amount,
        ]);
        $quotation->save();

        foreach($this->inputs as $detail){
            QuotationDetails::create([
                'quotation_id' => $quotation->id,
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

        notify()->success("Votre devis a été mis à jour !");
        return redirect()->route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $quotation->id, 'menu' => current_menu()]);

    }

    // Confirm the quotation and create a sale
    public function confirm(){
        // abort_if(Gate::denies('create_quotation_sales'), 403);
        if($this->quotation){
            $this->quotation->update([
                'status' => 'sale_order'
            ]);
            $this->confirmQT();
        }else{
            $this->sale();
        }
        // $this->status = 'sale_order';
    }

    // Confirm quotation by creating a sale
    public function confirmQT(){

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

        $sale = Sale::create([

            'company_id' => current_company()->id,
            'date' => $this->date,
            'seller_id' => $this->seller, //customer id
            'sales_team_id' => $this->sales_team, //customer id
            'customer_id' => $this->customer, //customer id
            'tax_percentage' => $this->tax_percentage,
            'discount_percentage' => $this->discount_percentage,
            'shipping_amount' => 0,
            'shipping_date' => $this->shipping_date,
            'shipping_policy' => $this->shipping_policy,
            // 'shipping_status' => 'Pending',
            'payment_term' => $this->payment_term,
            'payment_status' => $payment_status,
            'payment_method' => $paymentMethod,
            'paid_amount' => 0,
            'due_amount' => $this->total_amount * 100, //On va remplacer cela par le prix TTC
            'total_amount' => $this->total_amount * 100,
            'status' => 'to_invoice',
            'note' => $this->note,
            'tax_amount' => $this->tax_amount,
            'discount_amount' => $this->discount_amount,
            'quotation_id' => $this->quotation->id ?? null
        ]);

        // Sales Details
        foreach ($this->quotation->quotationDetails as $detail) {
            $sale_details = SalesDetail::create([
                'sale_id' => $sale->id,
                'product_id' => $detail->product_id,
                'product_name' => $detail->product_name,
                'product_code' => $detail->product_code,
                'quantity' => $detail->quantity,
                'price' => $detail->price,
                'unit_price' => $detail->price,
                'sub_total' => $detail->sub_total,
                'product_discount_amount' => 0,
                // 'product_discount_type' => $detail->options->product_discount_type,
                'product_tax_amount' => 0,
            ]);
            $sale_details->save();

            if(!module('inventory')){
                $product = Product::findOrFail($detail->product_id);
                $product->update([
                    'product_quantity' => $product->product_quantity - $detail->qty
                ]);
            }

        }

        if($this->quotation){
            $this->quotation->status = 'sale_order';
            $this->quotation->save();
        }

        if(module('inventory')){
            $logisticService = new LogisticService();
            $logisticService->launchDelivery($sale);
        }

        notify()->success("Nouveau bon de commande créé !");

        return redirect()->route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'menu' => current_menu()]);
    }

    // Confirm the sale from quotation
    public function sale(){

        $this->validate();

        $due_amount = $this->total_amount - $this->paid_amount;

        if (isset($this->payment_method)) {
            // Access the payment_method key
            $paymentMethod = $this->payment_method;
        } else {
            // Set a default value for payment_method
            $paymentMethod = 'cash';
        }
        if ($due_amount == $this->total_amount) {
            $payment_status = 'unpaid';
        } elseif ($due_amount > 0) {
            $payment_status = 'partial';
        } else {
            $payment_status = 'paid';
        }


        $sale = Sale::create([

            'company_id' => current_company()->id,
            'date' => $this->date,
            'seller_id' => $this->seller, //customer id
            'sales_team_id' => $this->sales_team, //customer id
            'customer_id' => $this->customer, //customer id
            'tax_percentage' => $this->tax_percentage,
            'discount_percentage' => $this->discount_percentage,
            'shipping_amount' => 0,
            'shipping_date' => $this->shipping_date,
            'shipping_policy' => $this->shipping_policy,
            // 'shipping_status' => 'Pending',
            'payment_term' => $this->payment_term,
            'payment_status' => $payment_status,
            'payment_method' => $paymentMethod,
            'paid_amount' => 0,
            'due_amount' => $this->total_amount * 100, //On va remplacer cela par le prix TTC
            'total_amount' => $this->total_amount * 100,
            'status' => 'to_invoice',
            'note' => $this->note,
            'tax_amount' => $this->tax_amount * 100,
            'discount_amount' => $this->discount_amount * 100,
            // 'quotation_id' => $this->quotation->id ?? null
        ]);

        foreach ($this->inputs as $detail) {
            $sale_details = SalesDetail::create([
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
            $sale_details->save();

            if(!module('inventory')){
                $product = Product::findOrFail($detail->product_id);
                $product->update([
                    'product_quantity' => $product->product_quantity - $detail->qty
                ]);
            }

        }

        if($this->quotation){
            $this->quotation->status = 'sale_order';
            $this->quotation->save();
        }

        if(module('inventory')){
            $logisticService = new LogisticService();
            $logisticService->launchDelivery($sale);
        }

        notify()->success("Nouveau bon de commande créé !");

        return redirect()->route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'menu' => current_menu()]);

    }

    public function canceled(Quotation $quotation){

        $quotation->update([
            'status' => 'canceled',
        ]);
        $quotation->save();

        $this->status = $quotation->status;
        // $this->dispatch('canceledQuotation', $quotation);
    }


    #[On('print-quotation')]
    // Print Quotation
    public function print(){
        try {
            // $quotation = Quotation::find(38);

            if (!$this->quotation) {
                throw new \Exception('Quotation not found');
            }

            $quotation = Quotation::findOrFail($this->quotation->id);

            $customer = Contact::findOrFail($quotation->customer_id);
            $seller = SalesPerson::findOrFail($quotation->seller_id);
            $company = current_company();

            $pdf = Pdf::loadView('sales::print-quotation', [
                'quotation' => $quotation,
                'customer' => $customer,
                'seller' => $seller,
                'company' => $company
            ])->setPaper('a4');

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output(); // Echo download contents directly...
            }, 'Devis -' . $quotation->reference . '.pdf');


            // return response($utf8Output)->download('quotation-' . $quotation->reference . '.pdf');
        } catch (\Exception $e) {
            Log::error('Error generating quotation PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }

    #[On('duplicate-quotation')]
    // Duplicate quotation
    public function duplicateQT(){

        $this->validate();

        DB::transaction(function () {
            $cart = Cart::instance('quotation');
            // Remove any non-numeric characters except the decimal point
            $this->total_amount = convertToInt($cart->total());
            $this->tax_amount = convertToInt($cart->tax());

            $quotation = Quotation::create([

                'company_id' => current_company()->id,
                'date' => $this->date,
                'expected_date' => $this->expected_date,
                'payment_term' => $this->payment_term,
                'seller_id' => $this->seller ?? 1, //customer id
                'sales_team_id' => $this->sales_team, //customer id
                'customer_id' => $this->customer, //customer id
                'tax_percentage' => $this->tax_percentage,
                'discount_percentage' => $this->discount_percentage,
                'shipping_amount' => 0,
                'shipping_date' => $this->shipping_date,
                'shipping_policy' => $this->shipping_policy,
                'shipping_status' => $this->status,
                'total_amount' => $this->total_amount / 100,
                'status' => $this->status,
                'note' => $this->note,
                'tax_amount' => $this->tax_amount,
                'discount_amount' => $this->discount_amount,
            ]);

            foreach (Cart::instance('quotation')->content() as $cart_item) {
                QuotationDetails::create([
                    'quotation_id' => $quotation->id,
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

            // Cart::instance('quotation')->store(Auth::user()->id);
            Cart::instance('quotation')->destroy();

            notify()->success("Nouveau Devis créé !");

            return redirect()->route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $quotation->id, 'menu' => current_menu()]);
        });

    }

    #[On('delete-quotation')]
    public function deleteQT(Quotation $quotation)
    {
        // $quotation = Quotation::find($quotation);
        $quotation->delete();
        return redirect()->route('sales.quotations.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function unlock(){
        $this->blocked = false;
        $this->dispatch('unlock-quotation');
    }

    public function lock(){
        $this->blocked = true;
        $this->dispatch('lock-quotation');
    }
}

