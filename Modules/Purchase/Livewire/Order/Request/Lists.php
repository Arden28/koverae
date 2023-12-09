<?php

namespace Modules\Purchase\Livewire\Order\Request;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('purchase::livewire.order.request.lists')
        ->extends('layouts.master');
    }
}
