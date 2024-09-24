<?php

namespace Modules\Invoicing\Livewire\PaymentTerm;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('invoicing::livewire.payment-term.create')
        ->extends('layouts.master');
    }
}
