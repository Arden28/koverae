<?php

namespace Modules\Manufacturing\Livewire\Order;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('manufacturing::livewire.order.lists')
        ->extends('layouts.master');
    }
}
