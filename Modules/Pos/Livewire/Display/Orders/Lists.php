<?php

namespace Modules\Pos\Livewire\Display\Orders;

use Livewire\Component;
use Modules\Contact\Entities\Contact;
use Modules\Pos\Entities\Order\PosOrder;
use Modules\Pos\Entities\Pos\Pos;
use Modules\Pos\Entities\Session\PosSession;
use Modules\Pos\Livewire\Display\Refund;

class Lists extends Component
{
    public Pos $pos;
    public $session;
    public $selected;

    public function mount($pos, $session){
        $this->pos = $pos;
        $this->session = PosSession::isCompany(current_company()->id)->where('unique_token', $session)->first();
    }

    public function render()
    {
        $customers = Contact::isCompany(current_company()->id)->isCustomer()->get();
        $orders = PosOrder::isCompany(current_company()->id)->isSession($this->session->id)->orderBy('id', 'desc')->get();
        return view('pos::livewire.display.orders.lists', compact('customers', 'orders'))
        ->extends('pos::layouts.shop');
    }

    public function selectOrder($order){
        $this->selected = $order;
        $this->dispatch('order-selected', order: $order)->to(Refund::class);
    }
}
