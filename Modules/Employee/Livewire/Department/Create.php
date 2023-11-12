<?php

namespace Modules\Employee\Livewire\Department;

use App\Models\Team\Team;
use Livewire\Component;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;

class Create extends Component
{
    public $name, $manager, $parent, $company, $employees, $departments;

    public function mount(){
        //
        $this->employees = Employee::isCompany(current_company()->id)->get();
        $this->departments = Department::isCompany(current_company()->id)->get();
    }

    public function render()
    {
        return view('employee::livewire.department.create')
        ->layout('layouts.master');
    }

    public function store(){

        $validatedData = $this->validate([
            'name' => 'required|string|max:60',
            'manager' => 'nullable|gt:0',
            'parent' => 'nullable|gt:0',
            'company' => 'required|gt:0',
        ]);

        $department = Department::create([
            'name' => $this->name,
            'head_id' => $this->manager,
            'parent_id' => $this->parent,
            'company_id' => $this->company,
        ]);

        // Clear form fields after creating the department.
        $this->reset(['name', 'manager', 'parent', 'company']);

        session()->flash('message', __('Le département a été ajouté !'));
        return redirect()->route('employee.department.index', ['subdomain' => current_company()->domain_name]);
    }
}
