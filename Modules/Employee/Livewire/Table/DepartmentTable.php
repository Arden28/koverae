<?php

namespace Modules\Employee\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Employee\Entities\Department;

class DepartmentTable extends Table
{

    public function createRoute() : string
    {

        return route('employee.department.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('employee.department.show' , ['subdomain' => current_company()->domain_name, 'department' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Départements";
    }

    public function query() : Builder
    {
        return Department::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', "Nom")->component('columns.common.show-title-link'),
            Column::make('head_id', "Manager")->component('columns.common.department.manager'),
            Column::make('id', "Employés")->component('columns.common.department.employees'),
            Column::make('parent_id', "Département Parent")->component('columns.common.department.parent'),
            Column::make('color', "Couleur")->component('columns.common.department.color'),
        ];
    }

    public function delete(Department $department)
    {
        $department->delete();
    }
}
