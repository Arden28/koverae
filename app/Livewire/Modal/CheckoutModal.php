<?php

namespace App\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;

class CheckoutModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.modal.checkout-modal');
    }
}
