<?php

namespace Modules\Calendar\Livewire\Calendar;

use Livewire\Component;

class Calendar extends Component
{
    public function render()
    {
        return view('calendar::livewire.calendar.calendar')
        ->extends('layouts.master');
    }
}
