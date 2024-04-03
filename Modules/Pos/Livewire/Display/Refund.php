<?php

namespace Modules\Pos\Livewire\Display;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Pos\Entities\Order\PosOrder;
use Modules\Pos\Entities\Pos\Pos;

class Refund extends Component
{
    public Pos $pos;
    public $order;
    public $customer = null, $selected = null;
    public $row_id, $qty_refund;

    public function mount($pos, $order = null){
        $this->pos = $pos;
        $this->order = $order;
    }
    public function render()
    {
        return view('pos::livewire.display.refund');
    }

    #[On('order-selected')]
    public function selectOrder(PosOrder $order){
        $this->order = $order;
        $this->customer = $order->customer;
        $this->selected = $order->details->last()->id;
    }

    public function selectedItem($row_id, $cart){
        $this->row_id = $row_id;
        $this->selected = $cart;
    }


    // public function updateQty($value)
    // {
    //     $this->qty_refund[$this->selected] .= $value;
    // }
}
