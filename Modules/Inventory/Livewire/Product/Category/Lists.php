<?php

namespace Modules\Inventory\Livewire\Product\Category;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.category.lists')
        ->extends('layouts.master');
    }
}
