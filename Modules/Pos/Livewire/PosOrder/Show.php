<?php

namespace Modules\Pos\Livewire\PosOrder;

use Livewire\Component;
use Modules\Pos\Entities\Order\PosOrder;

class Show extends Component
{
    public PosOrder $order;

    public function mount($order){
        $this->order = $order;
    }
    public function render()
    {
        return view('pos::livewire.pos-order.show')
        ->extends('layouts.master');
    }
}
