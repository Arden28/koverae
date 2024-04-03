<?php

namespace Modules\Manufacturing\Livewire\Order;

use Livewire\Component;
use Modules\Manufacturing\Entities\MO\ManufacturingOrder;

class Show extends Component
{
    public ManufacturingOrder $order;

    public function mount($order){
        $this->order = $order;
    }

    public function render()
    {
        return view('manufacturing::livewire.order.show')
        ->extends('layouts.master');
    }
}
