<?php

namespace Modules\Dashboards\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Modules\Dashboards\Entities\Dashboard;

class DashboardsTable extends Table
{

    public function createRoute() : string
    {
        return "#";
    }

    public function showRoute($id) : string
    {
        return "#";
    }

    public function emptyTitle() : string
    {
        return __("Créer un nouveau client dans votre carnet d'adresse");
    }

    public function emptyText() : string
    {
        return __('Koverae vous aide à facilement suivre toutes les activités liées à un client.');
    }

    public function headerName() : string
    {

        return 'Tableaux de bords';
    }

    public function query() : Builder
    {
        return Dashboard::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', 'Nom du Tableau')->component('columns.common.show-title-link'),
        ];
    }
}
