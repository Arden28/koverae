<?php

namespace Modules\Manufacturing\Livewire\Form;


use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Capsule;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Carbon\Carbon;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;
use Modules\Manufacturing\Entities\BOM\BillOfMaterialComponent;

class BomForm extends BaseForm
{
    use ActionBarButtonTrait;

    public $cartInstance = 'bom';
    public $bom;
    public $product, $name, $reference, $quantity, $bom_type, $flex_consumption, $lead_time, $prepare_days, $uom;
    public $inputs = [];

    public function mount($bom = null){
        if($bom){
            $this->reference = $bom->reference;
            $this->product = $bom->product_id;
            $this->quantity = $bom->quantity;
            $this->bom_type = $bom->bom_type;
            $this->name = $bom->name;
            $this->uom = $bom->uom_id;
        }else{
            $this->quantity = 1.00;
            $this->bom_type = 'manufacture';
            $this->flex_consumption = 'allowed_with_warnings';
            $this->uom = UnitOfMeasure::isCompany(current_company()->id)->first()->id;

        }
    }

    protected $rules = [
        'product' => 'required|integer',
        'quantity' => 'required|gt:0',
    ];

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('order','Composants')->component('tabs.bom'),
            // Tabs::make('miscellaneous','Divers'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('miscellaneous','Miscellaneous', 'miscellaneous')->component('tabs.group.light')
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group, placeholder, help)
            Input::make('product','Produit', 'select', 'product', 'left', 'none', 'none')->component('inputs.select.product'),
            Input::make('quantity','Quantité', 'tel', 'quantity', 'left', 'none', 'none', '', "Il doit s'agir de la plus petite quantité dans laquelle ce produit peut être fabriqué. Si la nomenclature contient des opérations, assurez-vous que la capacité du centre de charge est exacte."),
            Input::make('reference','Référence', 'select', 'reference', 'right', 'none', 'none'),
            Input::make('bom_type','Type de nomenclature', 'select', 'bom_type', 'right', 'none', 'none')->component('inputs.select.bom.type'),
            Input::make('uom','Unité de mesure', 'select', 'uom', 'left', 'none', 'none')->component('inputs.select.product.uom'),

            // Input::make('flex_consumption',"Consommation flexible", 'select', 'flex_consumption', 'left', 'miscellaneous', 'miscellaneous', '', "Définissez si vous pouvez consommer plus ou moins de composants que la quantité définie dans la nomenclature.Autorisé : autorisé pour tous les utilisateurs de fabrication.Autorisé avec avertissements : autorisé pour tous les utilisateurs de fabrication avec récapitulatif des différences de consommation à la clôture d'un ordre de fabrication.Notez que dans le cas d'une consommation manuelle de composants, où la consommation est enregistrée exclusivement manuellement, des avertissements de consommation seront également émis le cas échéant.Bloqué : seul le responsable peut clôturer l'ordre de fabrication lorsque la consommation de la nomenclature n'est pas respectée.")->component('inputs.select.bom.consumption'),
        ];
    }

    #[On('bom-cart')]
    public function updateInputs($inputs){
        $this->inputs = $inputs;
    }

    #[On('create-bom')]
    public function createBom(){
        //
        $this->validate();
        if($this->reference){
            $reference = $this->reference;
        }else{
            $reference = str()->slug(Product::find($this->product)->product_name);
        }

        $bom = BillOfMaterial::create([
            'company_id' => current_company()->id,
            'name' => Product::find($this->product)->product_name .':'. $reference,
            'reference' => $reference,
            'product_id' => $this->product,
            'bom_type' => $this->bom_type,
            'quantity' => $this->quantity,
            'uom_id' => $this->uom,
        ]);

        foreach($this->inputs as $component){
            BillOfMaterialComponent::create([
                'company_id' => current_company()->id,
                'bom_id' => $bom->id,
                'product_id' => $component['product'],
                'quantity' => $component['quantity'],
                'uom_id' => $component['uom'],
            ]);
        }

        $bom->save();
        return redirect()->route('manufacturing.boms.show', ['bom' => $bom->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('update-bom')]
    public function updateBom(){
        //
        $this->validate();
        $bom = $this->bom;

        $bom->update([
            'name' => Product::find($this->product)->product_name .':'. $this->reference,
            'reference' => $this->reference,
            'product_id' => $this->product,
            'bom_type' => $this->bom_type,
            'quantity' => $this->quantity,
            'uom_id' => $this->uom,
        ]);

        foreach ($bom->components as $component) {
            $component->delete();
        }


        foreach($this->inputs as $component){
            BillOfMaterialComponent::create([
                'company_id' => current_company()->id,
                'bom_id' => $bom->id,
                'product_id' => $component['product'],
                'quantity' => $component['quantity'],
                'uom_id' => $component['uom'],
            ]);
        }

        $bom->save();
        return redirect()->route('manufacturing.boms.show', ['bom' => $bom->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

}