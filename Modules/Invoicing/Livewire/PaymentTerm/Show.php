<?php

namespace Modules\Invoicing\Livewire\PaymentTerm;

use Livewire\Component;
use Modules\Invoicing\Entities\Payment\PaymentTerm;

class Show extends Component
{
    public PaymentTerm $term;

    public function mount(PaymentTerm $term){
        $this->term = $term;
    }

    public function render()
    {
        return view('invoicing::livewire.payment-term.show')
        ->extends('layouts.master');
    }
}
