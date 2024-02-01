<?php

namespace Modules\Employee\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Employee\Entities\Job;

class JobTable extends Table
{

    public function createRoute() : string
    {

        return route('employee.jobs.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('employee.jobs.show' , ['subdomain' => current_company()->domain_name, 'job' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Postes d'emplois";
    }

    public function query() : Builder
    {
        return Job::query();
    }

    public function columns() : array
    {
        return [
            Column::make('title', "Lieu de travail")->component('columns.common.show-title-link'),
            Column::make('department_id', "Département")->component('columns.common.employees.department'),
            Column::make('newers', "Ciblé"),
        ];
    }

    public function delete(Job $job)
    {
        $job->delete();
    }
}
