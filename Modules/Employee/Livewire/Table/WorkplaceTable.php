<?php

namespace Modules\Employee\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Employee\Entities\Workplace;

class WorkplaceTable extends Table
{

    public function createRoute() : string
    {

        return route('employee.workplaces.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('employee.workplaces.show' , ['subdomain' => current_company()->domain_name, 'workplace' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Lieux de travail";
    }

    public function query() : Builder
    {
        return Workplace::query();
    }

    public function columns() : array
    {
        return [
            Column::make('title', "Lieu de travail")->component('columns.common.show-title-link'),
        ];
    }

    public function delete(Workplace $worplace)
    {
        $worplace->delete();
    }
}
