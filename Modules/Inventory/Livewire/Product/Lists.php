<?php

namespace Modules\Inventory\Livewire\Product;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.lists')
        ->extends('layouts.master');
    }
}
