<?php

namespace Modules\Inventory\Livewire\Product\SerialNumber;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('inventory::livewire.product.serial-number.lists')
        ->extends('layouts.master');
    }
}
