<?php

namespace Modules\Employee\Livewire\Employees;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Employee\Entities\Employee as EntitiesEmployee;
use Illuminate\Http\Request;

class Employee extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 10;  // Default number of employees to show

    public $selectedEmployees = []; //Checkbox select

    public $deleteId = '';
    public $selectedEmployee = 'Arden';

    public $editing = false;

    public function render()
    {
        $employees = EntitiesEmployee::isCompany(current_company()->id)->paginate($this->show);

        return view('employee::livewire.employees.employee', compact('employees'))
            ->layout('layouts.master');
    }

    public function selectedId($id){
        return $this->deleteId == $id;
    }

    public function delete($deleteId)
    {
        EntitiesEmployee::find($deleteId)->delete();

        notify()->success("L'employé a bien été supprimé !");
    }
}
