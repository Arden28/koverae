<?php

namespace App\Livewire\Modal\Invoice;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateInvoice extends ModalComponent
{
    public function render()
    {
        return view('livewire.modal.invoice.create-invoice');
    }
}
