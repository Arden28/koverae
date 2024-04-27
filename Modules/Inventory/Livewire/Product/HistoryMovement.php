<?php

namespace Modules\Inventory\Livewire\Product;

use Livewire\Component;
use Modules\Inventory\Entities\Product;

class HistoryMovement extends Component
{
    public $product;

    public function mount($product = null){
        if($product){
        $this->product = $product;
        }
    }

    public function render()
    {
        return view('inventory::livewire.product.history-movement')
        ->extends('layouts.master');
    }
}
