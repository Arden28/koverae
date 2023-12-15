<?php

namespace App\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;

class Test extends ModalComponent
{
    public function render()
    {
        return view('livewire.modal.test');
    }
    
    public static function modalMaxWidth(): string
    {
        return 'md';
    }

}
