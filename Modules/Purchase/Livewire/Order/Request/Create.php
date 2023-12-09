<?php

namespace Modules\Purchase\Livewire\Order\Request;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Create extends Component
{
    public function mount(){
        Cart::instance('request-quotation')->destroy();
    }

    public function render()
    {
        return view('purchase::livewire.order.request.create')
        ->extends('layouts.master');
    }
}
