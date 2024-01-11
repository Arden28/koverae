<?php

namespace Modules\Employee\Livewire\Department;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Employee\Entities\Department;

class Lists extends Component
{

    public function render()
    {
        return view('employee::livewire.department.lists')
        ->extends('layouts.master');
    }
}
