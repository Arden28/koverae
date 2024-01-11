<?php

namespace Modules\Purchase\Livewire\Product;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('purchase::livewire.product.lists')
        ->extends('layouts.master');
    }
}
