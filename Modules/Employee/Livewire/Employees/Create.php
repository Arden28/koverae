<?php

namespace Modules\Employee\Livewire\Employees;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\Workplace;

class Create extends Component
{
    public function render()
    {
        return view('employee::livewire.employees.create')
        ->extends('layouts.master');
    }
}
