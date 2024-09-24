<?php

namespace Modules\Invoicing\Livewire\ReminderLevel;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('invoicing::livewire.reminder-level.lists')
        ->extends('layouts.master');
    }
}
