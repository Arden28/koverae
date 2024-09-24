<?php

namespace Modules\Invoicing\Livewire\ReminderLevel;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('invoicing::livewire.reminder-level.create')
        ->extends('layouts.master');
    }
}
