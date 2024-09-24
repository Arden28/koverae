<?php

namespace Modules\Invoicing\Livewire\ReminderLevel;

use Livewire\Component;
use Modules\Invoicing\Entities\Reminder\ReminderLevel;

class Show extends Component
{
    public ReminderLevel $level;

    public function mount(ReminderLevel $level){
        $this->level = $level;
    }

    public function render()
    {
        return view('invoicing::livewire.reminder-level.show')
        ->extends('layouts.master');
    }
}
