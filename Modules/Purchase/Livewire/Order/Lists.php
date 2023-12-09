<?php

namespace Modules\Purchase\Livewire\Order;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('purchase::livewire.order.lists')
        ->extends('layouts.master');
    }
}
