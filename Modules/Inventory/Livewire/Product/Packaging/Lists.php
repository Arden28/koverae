<?php

namespace Modules\Inventory\Livewire\Product\Packaging;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.packaging.lists')
        ->extends('layouts.master');
    }
}
