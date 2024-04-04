<?php

namespace Modules\Inventory\Livewire\Form;

use Livewire\Attributes\On;
use App\Livewire\Form\Template\SimpleAvatarForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Capsule;
use App\Livewire\Form\Table;
use App\Livewire\Table\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Livewire\WithFileUploads;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Category;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Inventory\Traits\ProductTrait;

class ProductForm extends SimpleAvatarForm
{
    use ActionBarButtonTrait, ProductTrait, WithFileUploads;

    public $product;

    public $product_name, $product_type, $invoice_policy, $uom, $purchase_uom, $price, $sale_taxes, $cost, $purchase_taxes, $category, $reference, $barcode, $control_policy, $purchase_description, $sale_description;

    public $sales_taxes =[];
    public $purchases_taxes =[];
    //
    public $responsible, $weight, $volume, $lead_time, $tracking;
    //
    public $income_account, $expense_account, $price_difference_account;

    public bool $can_be_sold = true, $can_be_purchased = true, $can_be_subscribed = false, $can_be_rented = false;

    public $status = 'active', $qty = 1;

    public $photos = [];
    public $photo;

    public bool $updateMode = false;

    public function mount($product = null){
        if($product){
            $this->updateMode = true;
            $this->category = $product->category_id;
            $this->product_name = $product->product_name;
            $this->product_type = $product->product_type;
            $this->invoice_policy = $product->invoicing_policy;
            $this->uom = $product->uom_id;
            $this->purchase_uom = $product->purchase_uom_id;
            $this->price = $product->product_price / 100;
            // $this->sale_taxes = $product->product_order_tax;
            $this->cost = $product->product_cost / 100;
            $this->sales_taxes = explode(',', $product->product_order_tax);
            $this->purchase_taxes = $product->product_purchase_tax;
            $this->reference = $product->product_internal_reference;
            $this->barcode = $product->product_barcode_symbology;
            $this->qty = $product->product_quantity;
            $this->control_policy = $product->control_policy;
            $this->purchase_description = $product->purchase_description;
            $this->sale_description = $product->sale_description;
            //
            $this->responsible = $product->responsible_id;
            $this->weight = $product->weight;
            $this->volume = $product->volume;
            $this->lead_time = $product->customer_lead_time;
            $this->tracking = $product->tracking;
            //
            $this->income_account = $product->income_account_id;
            $this->expense_account = $product->expense_account_id;
            $this->price_difference_account = $product->price_difference_account_id;
            //
            $this->can_be_sold = $product->can_be_sold;
            $this->can_be_purchased = $product->can_be_purchased;
            $this->can_be_rented = $product->can_be_rented;
            $this->can_be_subscribed = $product->can_be_subscribed;
            $this->status = $product->status;
        }else{
            // Set up default values
            $this->product_type = 'storable';
            $this->invoice_policy = 'ordered';
            $this->uom = UnitOfMeasure::isCompany(current_company()->id)->first()->id;
            $this->purchase_uom = UnitOfMeasure::isCompany(current_company()->id)->first()->id;
            $this->category = Category::isCompany(current_company()->id)->first()->id;
            $this->control_policy = 'received';
            $this->responsible = Contact::isCompany(current_company()->id)->first()->id;
            $this->weight = 0;
            $this->volume = 0;
            $this->lead_time = 1;
            $this->tracking = 'no_tracking';
            $this->sales_taxes[] = settings()->default_sales_tax_id;
            $this->purchases_taxes[] = settings()->default_purchase_tax_id;
            $this->sale_taxes = settings()->default_sales_tax_id;
            $this->purchase_taxes = settings()->default_purchase_tax_id;
        }
        // Update the formatted amount with XAF symbol
        // $this->price = number_format((float) $this->price, 2, ',', '.');
        $this->checkboxes = true;
    }

    protected $rules = [
        'product_name' => 'required|string',
        'product_type' => 'required|string',
        'invoice_policy' => 'required|string',
        'uom' => 'required|integer',
        'purchase_uom' => 'required|integer',
        'price' => 'required|string',
        'sale_taxes' => 'nullable|string',
        'cost' => 'nullable|string',
        // 's' => 'nullable|string',
        'category' => 'required|string',
        'reference' => 'nullable|string',
        'barcode' => 'nullable|string',
        'control_policy' => 'nullable|string',
        'purchase_description' => 'nullable|string',
        'sale_description' => 'nullable|string',
        //
        'responsible' => 'nullable|integer',
        'weight' => 'nullable|integer',
        'volume' => 'nullable|integer',
        'lead_time' => 'nullable|integer',
        'tracking' => 'nullable|string',
        //
        'income_account' => 'nullable|string',
        'expense_account' => 'nullable|string',
        'price_difference_account' => 'nullable|string',
        //
        'can_be_sold' => 'required|string',
        'can_be_purchased' => 'required|string',
        'can_be_rented' => 'required|string',
        'can_be_subscribed' => 'required|string',
    ];

    #[On('saveChange')]
    public function form() : string
    {
        if($this->updateMode == true){
            return "update()";
        }else{
            return 'store()';
        }
    }

    public function updateForm() : string
    {
        if($this->updateMode == true){
            return "update()";
        }else{
            return 'store()';
        }
    }

    // Action Bar Button
    public function actionBarButtons() : array
    {
        $type = $this->product_type;

        $buttons =  [
            // ActionBarButton::make('invoice', 'Créer une facture', 'storeQT()', 'sale_order'),
            ActionBarButton::make('update_quantiy', 'Actualiser la quantité', "", 'storable')->component('button.action-bar.update-qty'),
            ActionBarButton::make('replenish', 'Réapprovisionner', 'sale()', '')->component('button.action-bar.replenish-product'),
            ActionBarButton::make('print', 'Imprimer les étiquettes', 'preview()', ''),
            // Add more buttons as needed
        ];

        // Define the custom order of button keys
        $customOrder = ['', 'confirm', 'send', 'preview']; // Adjust as needed

        // Change dynamicaly the display order depends on status
        return $this->sortActionButtons($buttons, $customOrder, $type);
    }

    public function capsules() : array
    {
        return [
            Capsule::make('on_hand', 'En stock', 'Quantités disponibles.')->component('capsules.product.stock'),
            Capsule::make('prevision', 'Prévisions', 'Prévisions de stock.')->component('capsules.product.stats'),
            Capsule::make('bought', 'Acheté', 'Quantités achetées.')->component('capsules.product.bought'),
            Capsule::make('sold', 'Vendu', 'Quantités vendues.')->component('capsules.product.sold'),
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('general','Informations Générales'),
            Tabs::make('purchases','Achat'),
            Tabs::make('sales','Ventes'),
            Tabs::make('inventory','Inventaire'),
            Tabs::make('accounting','Comptabilité'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('group1',"Info", 'general')->component('tabs.group.light'),
            Group::make('suppliers',"Fournisseurs", 'purchases')->component('tabs.group.large-table'),
            Group::make('suppliers_invoice',"Factures Fournisseurs", 'purchases'),
            Group::make('purchase_description',"Description des achats", 'purchases'),
            //
            Group::make('sale_description',"Description vente", 'sales'),
            //
            Group::make('logistics',"Logistique", 'inventory'),
            Group::make('operations',"Opération", 'inventory'),
            Group::make('tracking',"Traçabilité", 'inventory'),
            // Group::make('packaging',"Conditionnement", 'inventory')->component('tabs.group.large-table'),
            //
            Group::make('customer_receivables',"Créances clients", 'accounting'),
            Group::make('customer_payables',"Dettes", 'accounting'),
        ];
    }

    public function tables() : array
    {
        return  [
            // make($key, $label,$type, $tabs = null, $group = null)
            Table::make('group1',"Info", 'purchases', 'suppliers'),
            // Group::make('return',"Retours", 'general'),
        ];
    }

    public function columns() : array
    {
        return  [
            // make($key, $label)
            Column::make('supplier_name',"Fournisseur"),
            Column::make('product_cost',"Prix"),
            Column::make('delivery_lead_time',"Delais de livraison"),
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, $placeholder, $help)
            Input::make('product_name',"Nom du produit", 'text', 'product_name', 'top-title', 'none', 'none', 'ex: Banéo 300G')->component('inputs.ke-title'),
            Input::make('product_type',"Type de produit", 'select', 'product_type', 'left', 'general', 'group1')->component('inputs.select.product.type'),
            Input::make('invoice_policy',"Politique de facturation", 'select', 'invoice_policy', 'left', 'general', 'group1', '', 'Quantité livrée: facturer les quantités livrées au client. Quantité commandée: facturer les quantités commandées par le client.')->component('inputs.select.product.invoice-policy'),
            Input::make('invoice_policy',"", 'select', 'invoice_policy', 'left', 'general', 'group1', '', 'Quantité livrée: facturer les quantités livrées au client. Quantité commandée: facturer les quantités commandées par le client.')->component('inputs.product.comment-type-product'),
            Input::make('uom',"UdM", 'select', 'uom', 'left', 'general', 'group1', '', 'Unité de mesure par défaut utilisée pour toutes les opérations de stock.')->component('inputs.select.product.uom'),
            Input::make('purchase_uom',"UdM Achat", 'select', 'uom', 'left', 'general', 'group1', '', 'Unité de mesure utilisée pour les bons de commandes.')->component('inputs.select.product.uom'),
            //
            Input::make('price',"Prix de vente", 'number', 'price', 'right', 'general', 'group1', "0.00")->component('inputs.product.product-price'),
            Input::make('sale_taxes',"Taxes à la vente", 'input', 'sale_taxes', 'right', 'general', 'group1')->component('inputs.tag.sale_taxes'),
            Input::make('cost',"Coût", 'number', 'cost', 'right', 'general', 'group1', "0.00")->component('inputs.product.product-price'),
            Input::make('category',"Catégorie", 'input', 'category', 'right', 'general', 'group1')->component('inputs.select.product.categories'),
            Input::make('reference',"Réf interne", 'input', 'reference', 'right', 'general', 'group1'),
            Input::make('barcode',"Code-barres", 'input', 'barcode', 'right', 'general', 'group1'),
            //
            Input::make('s',"Taxes", 'input', 'purchase_taxes', 'right', 'purchases', 'suppliers_invoice')->component('inputs.tag.sale_taxes'),
            Input::make('control_policy',"Politique de contrôle", 'input', 'control_policy', 'right', 'purchases', 'suppliers_invoice')->component('inputs.select.product.control-policy'),
            Input::make('purchase_description',"Description des achats", 'input', 'purchase_description', '', 'purchases', 'purchase_description', 'Cette note sera ajoutée aux bons de commandes.')->component('inputs.textarea.tabs-middle'),
            //
            Input::make('sale_description',"Description vente", 'input', 'sale_description', '', 'sales', 'sale_description', 'Cette note sera ajoutée aux commandes et factures.')->component('inputs.textarea.tabs-middle'),
            //
            Input::make('responsible',"Responsable", 'select', 'responsible', 'left', 'sales', 'logistics')->component('inputs.select.contact'),
            Input::make('weight',"Poids", 'input', 'weight', 'left', 'sales', 'logistics')->component('inputs.uom.weight'),
            Input::make('volume',"Volume", 'input', 'volume', 'left', 'sales', 'logistics')->component('inputs.uom.volume'),
            Input::make('lead_time',"Délai de livraison au client", 'input', 'lead_time', 'left', 'sales', 'logistics')->component('inputs.product.delivery-delay'),
            //
            Input::make('tracking',"Suivis", 'select', 'tracking', 'left', 'sales', 'tracking')->component('inputs.select.product.tracking'),
            //
            Input::make('income_account',"Compte de revenue", 'select', 'income_account', 'left', 'accounting', 'customer_receivables')->component('inputs.select.accounting.income-account'),
            Input::make('expense_account',"Compte de charge", 'select', 'expense_account', 'left', 'accounting', 'customer_payables')->component('inputs.select.accounting.charge-account'),
            Input::make('price_difference_account',"Compte d'écart de prix", 'select', 'price_difference_account', 'left', 'accounting', 'customer_payables')->component('inputs.select.accounting.charge-account'),
        ];
    }

    public function new(){
        return route('inventory.products.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('create-product')]
    public function store(){
        // $this->validate();


        $product = Product::create([
            'company_id' => current_company()->id,
            'category_id' => $this->category,
            'product_name' => $this->product_name,
            'product_type' => $this->product_type,
            'invoicing_policy' => $this->invoice_policy,
            'uom_id' => $this->uom,
            'purchase_uom_id' => $this->purchase_uom,
            'product_price' => $this->price * 100,
            'product_order_tax' => settings()->default_sales_tax_id,
            'product_cost' => $this->cost * 100,
            'product_purchase_tax' => settings()->default_purchase_tax_id,
            'product_internal_reference' => $this->reference,
            'product_barcode_symbology' => $this->barcode,
            'product_quantity' => $this->qty,
            'control_policy' => $this->control_policy,
            'purchase_description' => $this->purchase_description,
            'sale_description' => $this->sale_description,
            //
            'responsible_id' => $this->responsible,
            'weight' => $this->weight,
            'volume' => $this->volume,
            'customer_lead_time' => $this->lead_time,
            'tracking' => $this->tracking,
            //
            'income_account_id' => $this->income_account,
            'expense_account_id' => $this->expense_account,
            'price_difference_account_id' => $this->price_difference_account,
            //
            'can_be_sold' => $this->can_be_sold,
            'can_be_purchased' => $this->can_be_purchased,
            'can_be_rented' => $this->can_be_rented,
            'can_be_subscribed' => $this->can_be_subscribed,
            'status' => $this->status,
        ]);
        // $product->save();
        $this->updatedPhoto();

        return redirect()->route('inventory.products.show', ['product' => $product->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('saveChange')]
    public function update(){
        // $this->validate();

        $product = $this->product;
        if($product){
            $product->update([
                'category_id' => $this->category,
                'product_name' => $this->product_name,
                'product_type' => $this->product_type,
                'invoicing_policy' => $this->invoice_policy,
                'uom_id' => $this->uom,
                'purchase_uom_id' => $this->purchase_uom,
                'product_price' => $this->price * 100,
                'product_order_tax' => settings()->default_sales_tax_id,
                'product_cost' => $this->cost * 100,
                'product_purchase_tax' => settings()->default_purchase_tax_id,
                'product_internal_reference' => $this->reference,
                'product_barcode_symbology' => $this->barcode,
                'product_quantity' => $this->qty,
                'control_policy' => $this->control_policy,
                'purchase_description' => $this->purchase_description,
                'sale_description' => $this->sale_description,
                //
                'responsible_id' => $this->responsible,
                'weight' => $this->weight,
                'volume' => $this->volume,
                'customer_lead_time' => $this->lead_time,
                'tracking' => $this->tracking,
                //
                'income_account_id' => $this->income_account,
                'expense_account_id' => $this->expense_account,
                'price_difference_account_id' => $this->price_difference_account,
                //
                'can_be_sold' => $this->can_be_sold,
                'can_be_purchased' => $this->can_be_purchased,
                'can_be_rented' => $this->can_be_rented,
                'can_be_subscribed' => $this->can_be_subscribed,
                'status' => $this->status,
            ]);
        }else{

            $product = Product::create([
                'company_id' => current_company()->id,
                'category_id' => $this->category,
                'product_name' => $this->product_name,
                'product_type' => $this->product_type,
                'invoicing_policy' => $this->invoice_policy,
                'uom_id' => $this->uom,
                'purchase_uom_id' => $this->purchase_uom,
                'product_price' => $this->price * 100,
                'product_order_tax' => settings()->default_sales_tax_id,
                'product_cost' => $this->cost * 100,
                'product_purchase_tax' => settings()->default_purchase_tax_id,
                'product_internal_reference' => $this->reference,
                'product_barcode_symbology' => $this->barcode,
                'product_quantity' => $this->qty,
                'control_policy' => $this->control_policy,
                'purchase_description' => $this->purchase_description,
                'sale_description' => $this->sale_description,
                //
                'responsible_id' => $this->responsible,
                'weight' => $this->weight,
                'volume' => $this->volume,
                'customer_lead_time' => $this->lead_time,
                'tracking' => $this->tracking,
                //
                'income_account_id' => $this->income_account,
                'expense_account_id' => $this->expense_account,
                'price_difference_account_id' => $this->price_difference_account,
                //
                'can_be_sold' => $this->can_be_sold,
                'can_be_purchased' => $this->can_be_purchased,
                'can_be_rented' => $this->can_be_rented,
                'can_be_subscribed' => $this->can_be_subscribed,
                'status' => $this->status,
            ]);
            $product->save();
        }
        // dd($data);

        // return $this->redirectRoute('inventory.products.show', ['product' => $product->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()], navigate:true);
        return redirect()->route('inventory.products.show', ['product' => $product->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        // Store the file in the public disk
        $this->photo->store('/assets', 'public');

        $this->photo->store('/public');

    
        // You can then save the path or perform additional actions as needed
    }
    
    // Taxes
}
