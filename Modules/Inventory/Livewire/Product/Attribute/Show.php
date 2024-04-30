<?php

namespace Modules\Inventory\Livewire\Product\Attribute;

use Livewire\Component;
use Modules\Inventory\Entities\Product\Variant\Attribute;

class Show extends Component
{
    public Attribute $attribute;

    public function mount($attribute){
        $this->attribute = $attribute;
    }

    public function render()
    {
        return view('inventory::livewire.product.attribute.show')
        ->extends('layouts.master');
    }
}
