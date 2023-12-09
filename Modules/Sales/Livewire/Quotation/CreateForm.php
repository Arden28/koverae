<?php

namespace Modules\Sales\Livewire\Quotation;

use Livewire\Component;
use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
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

class CreateForm extends Component
{
    use ActionBarButtonTrait;

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

    public $name;

    public $qty = 1;

    private $quotationService;

    public function mount(QuotationService $quotationService)
    {
        $this->quotationService = $quotationService;
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
            Tabs::make('order','Commande')->component('tabs.order'),
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
            ActionBarButton::make('send', 'Envoyer par Email', 'storeQT()', 'quotation'),
            ActionBarButton::make('confirm', 'Confirmer', 'confirmQT()', 'sent'),
            ActionBarButton::make('preview', 'Aperçu', 'preview()', 'previewed'),
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
            StatusBarButton::make('quotation', 'Devis', 'quotation'),
            StatusBarButton::make('sent', 'Envoyé', 'sent'),
            StatusBarButton::make('sale_order', 'Bon de commande', 'sale_order'),
            StatusBarButton::make('canceled', 'Annulé', 'canceled')->component('button.status-bar.canceled'),
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

}
