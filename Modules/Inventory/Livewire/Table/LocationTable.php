<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;

class LocationTable extends Table
{

    public function createRoute() : string
    {

        return route('inventory.locations.create' , ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.locations.show' , ['subdomain' => current_company()->domain_name, 'location' => $id ]);
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
            Column::make('name', "Emplacement")->component('columns.common.show-title-link'),
            Column::make('type', "Type d'emplacement")
        ];
    }

    public function delete(WarehouseLocation $location)
    {
        $location->delete();
    }
}
