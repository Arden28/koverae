<?php

namespace Modules\Inventory\Livewire\Product\Attribute;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.attribute.lists')
        ->extends('layouts.master');
    }
}
