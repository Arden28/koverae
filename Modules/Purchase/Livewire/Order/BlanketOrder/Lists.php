<?php

namespace Modules\Purchase\Livewire\Order\BlanketOrder;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('purchase::livewire.order.blanket-order.lists')
        ->extends('layouts.master');
    }
}
