<?php

namespace Modules\Inventory\Livewire\Product;

use Livewire\Component;
use Modules\Inventory\Entities\Product;

class ProductQuantity extends Component
{
    public Product $product;

    public function mount($product){
        $this->product = $product;
    }

    public function render()
    {
        return view('inventory::livewire.product.product-quantity')
        ->extends('layouts.master');
    }
}
