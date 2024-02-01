<?php

namespace Modules\Manufacturing\Livewire\Order;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('manufacturing::livewire.order.create')
        ->extends('layouts.master');
    }
}
