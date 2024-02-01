<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Simple extends ModalComponent
{
    public $header;
    public function render()
    {
        return view('livewire.modal.simple');
    }
}
