<?php

namespace Modules\Employee\Livewire\Department;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Employee\Entities\Department;

class Lists extends Component
{
    public $deleteId = '';

    public function render()
    {
        $departments = Department::isCompany(current_company()->id)->get();
        return view('employee::livewire.department.lists', compact('departments'))
        ->layout('layouts.master');
    }

    public function selectedId($id){
        return $this->deleteId == $id;
    }

    public function delete($deleteId)
    {
        Department::find($deleteId)->delete();

        notify()->success('Laravel Notify is awesome!');
    }
}
