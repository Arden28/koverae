<?php

namespace Modules\Inventory\Livewire\Product\SerialNumber;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.serial-number.create')
        ->extends('layouts.master');
    }
}
