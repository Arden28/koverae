<?php

namespace Modules\Inventory\Livewire\Product;

use Livewire\Component;
use Modules\Inventory\Entities\Product;

class Show extends Component
{
    public Product $product;

    public function mount($product){
        $this->product = $product;
    }

    public function render()
    {
        return view('inventory::livewire.product.show')
        ->extends('layouts.master');
    }
}
