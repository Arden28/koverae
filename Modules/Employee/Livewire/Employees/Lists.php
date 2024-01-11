<?php

namespace Modules\Employee\Livewire\Employees;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('employee::livewire.employees.lists')
        ->extends('layouts.master');
    }
}
