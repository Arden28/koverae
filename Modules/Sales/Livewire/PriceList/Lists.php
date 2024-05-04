<?php

namespace Modules\Sales\Livewire\PriceList;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('sales::livewire.price-list.lists')
        ->extends('layouts.master');
    }
}
