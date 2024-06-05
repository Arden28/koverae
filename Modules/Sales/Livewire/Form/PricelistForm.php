<?php

namespace Modules\Sales\Livewire\Form;

use App\Livewire\Form\BaseForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use Livewire\Attributes\On;

class PricelistForm extends BaseForm
{

    public $cartInstance = 'pricelist';
    public $pricelist;
    public $name, $discount_policy, $country_group;
    // Rules Cart
    public $inputs = [];

    public function mount($pricelist = null){
        if($pricelist){
            $this->name = $pricelist->name;
            $this->discount_policy = $pricelist->discount_policy;
            $this->country_group = $pricelist->country_group_id;
        }
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            Tabs::make('pricelist-rule',__('translator::sales.form.pricelist.tabs.rules')),
            // Tabs::make('configuration','Configuration'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs = null)
            Group::make('base_info',__('translator::sales.form.pricelist.groups.base_info'), 'none')->component('tabs.group.light'),
            Group::make('availability',__('translator::sales.form.pricelist.groups.availability'), 'confuguration')->component('tabs.group.light'),
            Group::make('discount',__('translator::sales.form.pricelist.groups.discount'), 'confuguration'),
            // Group::make('return',"Retours", 'general'),
        ];
    }

    public function inputs() : array
    {
        return  [
            // make($key, $label, $transfer, $model, $position, $tab, $group, $placeholder = null, $help = null)
            Input::make('name',"", 'text', 'name', 'left', 'none', 'base_info', __('translator::components.inputs.pricelist-name.placeholder'))->component('inputs.ke-title'),
        ];
    }

}