<?php

namespace Modules\Inventory\Livewire\Product\Packaging;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.packaging.create')
        ->extends('layouts.master');
    }
}
