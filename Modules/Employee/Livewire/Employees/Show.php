<?php

namespace Modules\Employee\Livewire\Employees;

use App\Models\Company\Company;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\Workplace;

class Show extends Component
{
    public Employee $employee;


    public function mount($employee){
        $this->employee = $employee;
    }

    public function render()
    {
        return view('employee::livewire.employees.show')
        ->extends('layouts.master');
    }

}
