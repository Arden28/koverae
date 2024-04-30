<?php

namespace Modules\Inventory\Livewire\Form;


use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use Livewire\Attributes\On;

class ProductAttributeForm extends  BaseForm
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
        'values' => 'required|array',
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

    #[On('attribute-cart')]
    public function updateInputs($inputs){
        $this->values = $inputs;
    }

    #[On('create-attribute')]
    public function storeAttribute(){
        $this->validate();
    }

    #[On('update-attribute')]
    public function updateAttribute(){
        $this->validate();
    }

}
