<?php

namespace Modules\Employee\Livewire\Department;

use Illuminate\Http\Request;
use Livewire\Component;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;

class Show extends Component
{
    public $department;

    public $name, $manager, $parent, $employees, $departments;

    public $deleteId = '';

    public function mount(){
        $this->name = $this->department->name;
        $this->manager = $this->department->head_id;
        $this->parent = $this->department->parent_id;
        //
        $this->employees = Employee::isCompany(current_company()->id)->get();
        $this->departments = Department::isCompany(current_company()->id)->where('id', '<>', $this->department->id)->get();
    }


    // Real-time validation rules
    public function rules()
    {
        return [
            'name' => 'required|string|max:60',
            'manager' => 'nullable|gt:0',
            'parent' => 'nullable|gt:0',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->manager = '';
    }

    public function render()
    {
        return view('employee::livewire.department.show')
        ->layout('layouts.master');
    }

    public function update($department){
        $this->validate();
        $department = Department::find($department);

        $department->update([
            'name' => $this->name,
            'head_id' => $this->manager,
            'parent_id' => $this->parent,
        ]);

        session()->flash('message', 'Département mis à jour.');

    }
}
