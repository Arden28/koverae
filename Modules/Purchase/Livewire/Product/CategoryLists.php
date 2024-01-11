<?php

namespace Modules\Purchase\Livewire\Product;

use Livewire\Component;

class CategoryLists extends Component
{
    public function render()
    {
        return view('purchase::livewire.product.category-lists')
        ->extends('layouts.master');
    }
}
