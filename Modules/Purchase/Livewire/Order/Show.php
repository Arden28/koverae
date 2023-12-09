<?php

namespace Modules\Purchase\Livewire\Order;

use Livewire\Component;
use Modules\Purchase\Entities\Purchase;

class Show extends Component
{
    public $purchase;

    public function mount (Purchase $purchase){
        $this->purchase = $purchase;
    }
    public function render()
    {
        return view('purchase::livewire.order.show')
        ->extends('layouts.master');
    }
}
