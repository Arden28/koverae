<?php

namespace Modules\Settings\Livewire\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddLanguage extends ModalComponent
{
    public function render()
    {
        return view('settings::livewire.modal.add-language');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
