<?php

namespace Modules\Inventory\Livewire\Product;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.create')
        ->extends('layouts.master');
    }
}
