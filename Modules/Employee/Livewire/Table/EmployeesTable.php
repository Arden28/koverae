<?php

namespace Modules\Employee\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Employee\Entities\Employee;

class EmployeesTable extends Table
{

    public function createRoute() : string
    {

        return route('employee.create' , ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('employee.show' , ['subdomain' => current_company()->domain_name, 'employee' => $id ]);
    }

    public function headerName() : string
    {

        return "Employés";
    }

    public function query() : Builder
    {
        return Employee::query();
    }

    public function columns() : array
    {
        return [
            Column::make('id', "Nom")->component('columns.common.employees.employee'),
            Column::make('id', "Téléphone")->component('columns.common.employees.phone'),
            Column::make('id', "Email")->component('columns.common.employees.email'),
            Column::make('id', "Activité")->component('columns.common.employees.email'),
            Column::make('id', "Département")->component('columns.common.employees.department'),
            Column::make('id', "Position")->component('columns.common.employees.position'),
            Column::make('id', "Manager")->component('columns.common.employees.manager'),
        ];
    }

    public function delete(Employee $type)
    {
        // $type = OperationType::find($type);
        $type->delete();
    }
}
