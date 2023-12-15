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
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeam;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class QuotationForm extends BaseForm
{
    use ActionBarButtonTrait;

    public $quotation;

    public $customer,

    $date,

    $expected_date,

    $payment_term = 'immediate_payment',
    $reference,
    $tax_percentage = 18.9,
    $tax_amount = 0,
    $discount_percentage = 0,
    $discount_amount = 0,
    $shipping_amount = 0,
    $paid_amount = 0,
    $due_amount = 0,
    $total_amount = 0,
    $payment_method = 'Cash',
    $payment_status,
    $status = 'quotation',
    $note,

    $seller,

    $sellers = [],

    $sales_team,

    $sales_teams = [],

    $tags,

    $shipping_policy,

    $shipping_date,

    $shipping_status = 'pending';

    public $updateMode = false;

    public $customer_name;

    public $qty = 1;

    private $quotationService;

    public $sale;

    public $model;


    public function mount($quotation = null){
        if($quotation){

            $this->quotation = $quotation;

            $this->model = $quotation;

            $this->sale = $quotation->sale;

            $this->customer = $quotation->customer_id;
            $this->customer_name = Contact::findOrFail($quotation->customer_id)->name;
            $this->date = $quotation->date;
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

            // Update the cart
            $quotation_details = $quotation->quotationDetails;

            Cart::instance('quotation')->destroy();

            $cart = Cart::instance('quotation');

            foreach ($quotation_details as $quotation_detail) {
                $cart->add([
                    'id'      => $quotation_detail->product_id,
                    'name'    => $quotation_detail->product_name,
                    'qty'     => $quotation_detail->quantity,
                    'price'   => $quotation_detail->price,
                    'weight'  => 1,
                    'options' => [
                        'description'  => $quotation_detail->product->description,
                        'product_discount' => $quotation_detail->product_discount_amount,
                        'product_discount_type' => $quotation_detail->product_discount_type,
                        'sub_total'   => $quotation_detail->sub_total,
                        'code'        => $quotation_detail->product_code,
                        'stock'       => Product::findOrFail($quotation_detail->product_id)->product_quantity,
                        'product_tax' => $quotation_detail->product_tax_amount,
                        'unit_price'  => $quotation_detail->unit_price
                    ]
                ]);
            }
        }
    }

    protected $rules = [
        'customer' => 'required',
        'date' => 'required',
        'expected_date' => 'nullable',
        'payment_term' => 'required',
        // 'tax_percentage' => 'nullable|integer|min:0|max:100',
        // 'discount_percentage' => 'nullable|integer|min:0|max:100',
        // 'shipping_amount' => 'nullable|numeric',
        // 'total_amount' => 'nullable|numeric',
        // 'status' => 'nullable|string|max:255',
        // 'note' => 'nullable|string|max:1000',
        'seller' => 'nullable',
        // 'sales_team' => 'nullable',
        // 'tags' => 'nullable',
        // 'shipping_policy' => 'nullable',
        // 'shipping_date' => 'nullable',
        // 'shipping_status' => 'nullable|string',
    ];

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('customer','Client', 'select', 'customer', 'left', 'none', 'none')->component('inputs.select.contact'),
            Input::make('date','Date', 'date', 'date', 'right', 'none', 'none'),
            Input::make('expiration','Expiration', 'date', 'expiration_date', 'right', 'none', 'none'),
            Input::make('payment_term','Modalité de paiement', 'select', 'payment_term', 'right', 'none', 'none')->component('inputs.select.payment_term'),

            //Note
            Input::make('note','Modalité de paiement', 'textarea', 'note', '', 'summary', 'none')->component('inputs.textarea.tabs-middle'),

            // Sales
            Input::make('salesTeams','Equipe de vente', 'select', 'sales_team', '', 'other', 'sales')->component('inputs.select.sales_teams'),
            Input::make('seller','Commercial(e)', 'select', 'seller', '', 'other', 'sales')->component('inputs.select.sales.seller'),
            Input::make('tags','Tag(s)', 'select', 'tags', '', 'other', 'sales')->component('inputs.select.sales.tags'),

            // Shipping
            Input::make('shipping_policy','Politique de livraison', 'select', 'shipping_policy', '', 'other', 'delivery')->component('inputs.select.shipping.policy'),
            Input::make('shipping_date','Date de livraison', 'date', 'shipping_date', '', 'other', 'delivery'),

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
            // ActionBarButton::make('invoice', 'Créer une facture', 'storeQT()', 'sale_order'),
            ActionBarButton::make('send', 'Envoyer par Email', "", 'quotation')->component('button.action-bar.send-email'),
            ActionBarButton::make('confirm', 'Confirmer', 'confirmQT()', 'sent')->component('button.action-bar.confirmed-quotation'),
            ActionBarButton::make('preview', 'Aperçu', 'preview()', 'previewed'),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['invoice', 'confirm', 'send', 'preview']; // Adjust as needed

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
            Capsule::make('sale', 'Vente(s)', 'Les ventes générées via le devis.')->component('capsules.sale-capsule'),
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


    public function form() : string
    {
        return 'storeQT()';
    }

    // Store quotation
    public function storeQT(){

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
                'shipping_status' => 'Pending',
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

            return $this->redirect(route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $quotation->id]), navigate:true);
        });

    }

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

            // $folderPath = "companies/{$company->name}/files/quotations";
            // $filePath = "$folderPath/{$quotation->reference}.pdf";

            // // Check if the file already exists
            // if (Storage::exists($filePath)) {
            //     // Delete the existing file
            //     Storage::delete($filePath);
            // }

            // // Ensure the directory exists, create it if not
            // Storage::makeDirectory($folderPath);

            // // Save the PDF to the storage
            // Storage::put($filePath, $pdf->output());

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output(); // Echo download contents directly...
            }, 'Devis -' . $quotation->reference . '.pdf');


            // return response($utf8Output)->download('quotation-' . $quotation->reference . '.pdf');
        } catch (\Exception $e) {
            Log::error('Error generating quotation PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }

}

