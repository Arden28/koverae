<?php

namespace Modules\Inventory\Livewire\Product\Attribute;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.attribute.create')
        ->extends('layouts.master');
    }
}
