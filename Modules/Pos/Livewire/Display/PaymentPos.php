<?php

namespace Modules\Pos\Livewire\Display;

use Livewire\Component;
use Modules\Pos\Entities\Order\PosOrder;
use Modules\Pos\Entities\Pos\Pos;

class PaymentPos extends Component
{
    public Pos $pos;
    public $session, $order;

    public function mount($pos, $session, $order){
        $this->pos = $pos;
        $this->session = $session;
        $this->order = PosOrder::findByToken($order)->first();
    }

    public function render()
    {
        return view('pos::livewire.display.payment-pos')
        ->extends('pos::layouts.shop');
    }

    public function printContent()
    {
        $script = <<<SCRIPT
        <script>
            var contentToPrint = document.getElementById('contentToPrint');
            var popupWin = window.open('', '_blank', 'width=600,height=600');
            popupWin.document.open();
            popupWin.document.write('<html><head><title>Print</title></head><body onload="window.print()">' + contentToPrint.innerHTML + '</html>');
            popupWin.document.close();
        </script>
        SCRIPT;

        return $script;
    }
}
