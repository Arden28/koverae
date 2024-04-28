<?php

namespace Modules\Inventory\Livewire\Product;

use Livewire\Component;

class ProductStock extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.product-stock')
        ->extends('layouts.master');
    }
}
