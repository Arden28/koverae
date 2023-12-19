<?php

namespace Modules\Purchase\Livewire\Invoice;

use Livewire\Component;
use Modules\Invoicing\Entities\Vendor\Bill;
use Modules\Purchase\Entities\Purchase;

class InvoiceShow extends Component
{

    public $purchase, $invoice;

    public function mount(Purchase $purchase, Bill $invoice){
        $this->purchase = $purchase;
        $this->invoice = $invoice;
    }
    public function render()
    {
        return view('purchase::livewire.invoice.invoice-show')
        ->extends('layouts.master');
    }
}
