<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use Livewire\Attributes\On;
use Modules\Inventory\Entities\Product\Variant\Attribute;
use Modules\Inventory\Entities\Product\Variant\AttributeValue;

class ProductAttributeForm extends BaseForm
{
    public $attribute;
    public $name, $display_type, $variant_method;
    public $values = [];
    public bool $updateMode = false;

    public function mount($attribute = null){
        if($attribute){
            $this->name = $attribute->name;
            $this->display_type = $attribute->display_type;
            $this->variant_method = $attribute->variant_method;
            $this->updateMode = true;
        }else{
            $this->display_type = 'radio';
            $this->variant_method = 'instantly';
        }

    }

    protected $rules = [
        'name' => 'required|string',
        'display_type' => 'required|string',
        'variant_method' => 'required|string',
        // 'values' => 'required|array',
    ];

    public function inputs() : array
    {
        return  [
            // make($key, $label, $transfer, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name',__("Nom de l'attribut"), 'text', 'name', 'left', 'none', 'base_info'),
            Input::make('display_type',__("Type d'affichage"), 'select', 'display_type', 'right', 'none', 'base_info')->component('inputs.select.product.attribute.display-type'),
            Input::make('variant_method',__("Mode de création des valeurs"), 'select', 'variant_method', 'right', 'none', 'base_info')->component('inputs.select.product.attribute.variant-method'),
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('order',"Valeurs")->component('tabs.attribute-value'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('base_info',"Informations Générales", 'none')->component('tabs.group.light'),
            Group::make('general_info',"Informations Générales", 'general')->component('tabs.group.light'),
            Group::make('other_info',"Autres Informations", 'supp_info'),
            // Group::make('return',"Retours", 'general'),
        ];
    }

    #[On('product-attribute-cart')]
    public function updateInputs($inputs){
        $this->values = $inputs;
    }

    #[On('create-attribute')]
    public function storeAttribute(){
        $this->validate();

        $attribute = Attribute::create([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'display_type' => $this->display_type,
        ]);

        if($attribute->values()->count() >= 1){
            foreach($attribute->values() as $key => $value){
                $value->delete();
            }
        }
        foreach($this->values as $key => $value){
            AttributeValue::create([
                'company_id' => current_company()->id,
                'attribute_id' => $attribute->id,
                'name' => $value['name'],
                'additional_price' => $value['price']
            ]);
        }

        return redirect()->route('inventory.products.attributes.show', ['attribute' => $attribute->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('update-attribute')]
    public function updateAttribute(){
        $this->validate();
        $attribute = $this->attribute;

        $attribute->update([
            'name' => $this->name,
            'display_type' => $this->display_type,
        ]);
        $attribute->save();

        if($attribute->values()->count() >= 1){
            foreach($attribute->values() as $key => $value){
                $value->delete();
            }
        }
        foreach($this->values as $key => $value){
            AttributeValue::create([
                'company_id' => current_company()->id,
                'attribute_id' => $attribute->id,
                'name' => $value['name'],
                'additional_price' => $value['price']
            ]);
        }

        return redirect()->route('inventory.products.attributes.show', ['attribute' => $attribute->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('duplicate-attribute')]
    public function duplicateAttribute(Attribute $attribute){
        $this->validate();

        $attribute = Attribute::create([
            'company_id' => $attribute->company_id,
            'name' => $attribute->name,
            'display_type' => $attribute->display_type,
        ]);

        foreach($attribute->values() as $key => $value){
            AttributeValue::create([
                'company_id' => $value->company_id,
                'attribute_id' => $value->attribute_id,
                'name' => $value->name,
                'additional_price' => $value->additional_price
            ]);
        }

        return redirect()->route('inventory.products.attributes.show', ['attribute' => $attribute->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('delete-attribute')]
    public function deleteAttribute(Attribute $attribute){

        $attribute->delete();
        return redirect()->route('inventory.products.attributes.show', ['attribute' => $attribute->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }
}
