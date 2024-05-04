<?php

namespace Modules\Sales\Livewire\PriceList;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('sales::livewire.price-list.create')
        ->extends('layouts.master');
    }
}
