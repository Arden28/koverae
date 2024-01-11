<?php

namespace Modules\Sales\Livewire\Product;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('sales::livewire.product.lists')
        ->extends('layouts.master');
    }
}
