<?php

namespace Modules\Inventory\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use Livewire\Attributes\On;
use Modules\Inventory\Entities\Product\Serial\SerialNumber;

class ProductSerialNumberForm extends BaseForm
{
    public $lot;
    public $name, $internal_reference, $product, $quantity = 1;
    public $values = [];
    public bool $updateMode = false;

    public function mount($lot = null){
        if($lot){
            $this->name = $lot->reference;
            $this->internal_reference = $lot->internal_reference;
            $this->product = $lot->product_id;
            $this->quantity = $lot->quantity;
            $this->updateMode = true;
        }else{
            $max = SerialNumber::max('id') + 1;
            $this->name = 0000..$max;
        }

    }

    protected $rules = [
        'name' => 'required|string',
        'internal_reference' => 'nullable|string',
        'quantity' => 'required|string',
        // 'values' => 'required|array',
    ];

    public function inputs() : array
    {
        return  [
            // make($key, $label, $transfer, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name',__("Lot/numéro de série"), 'text', 'name', 'left', 'none', 'base_info')->component('inputs.ke-title'),
            Input::make('product', 'Produit', 'select', 'product', 'left', 'none', 'none')->component('inputs.select.product'),
            Input::make('reference',__("Référence interne"), 'text', 'reference', 'left', 'none', 'base_info'),
        ];
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            // Tabs::make('order',"Valeurs")->component('tabs.attribute-value'),
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
}
