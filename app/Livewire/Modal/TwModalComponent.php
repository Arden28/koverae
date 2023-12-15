<?php

namespace App\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;

class TwModalComponent extends ModalComponent
{
    public static function modalMaxWidthClass(): string
    {
        return str_replace(':', ':tw-', parent::modalMaxWidthClass());
    }
}
