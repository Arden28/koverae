<?php

namespace Modules\Invoicing\Livewire\PaymentTerm;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('invoicing::livewire.payment-term.lists')
        ->extends('layouts.master');
    }
}
