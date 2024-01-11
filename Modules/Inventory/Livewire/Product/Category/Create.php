<?php

namespace Modules\Inventory\Livewire\Product\Category;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.category.create')
        ->extends('layouts.master');
    }
}
