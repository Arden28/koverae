<?php

namespace Modules\Manufacturing\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;

class ManufacturingOrderTable extends Table
{

    public function createRoute() : string
    {

        return route('inventory.locations.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.locations.show' , ['subdomain' => current_company()->domain_name, 'location' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Emplacements";
    }

    public function query() : Builder
    {
        return WarehouseLocation::query();
    }

    public function columns() : array
    {
        return [
            Column::make('id', "Emplacement")->component('columns.common.location'),
            Column::make('type', "Type d'emplacement")
        ];
    }

    public function delete(WarehouseLocation $location)
    {
        $location->delete();
    }
}
