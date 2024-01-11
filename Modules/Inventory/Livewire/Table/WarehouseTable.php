<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Warehouse\Warehouse;

class WarehouseTable extends Table
{

    public function createRoute() : string
    {

        return route('inventory.warehouses.create' , ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.warehouses.show' , ['subdomain' => current_company()->domain_name, 'warehouse' => $id ]);
    }

    public function headerName() : string
    {

        return "Entrepôts";
    }

    public function query() : Builder
    {
        return Warehouse::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', "Entrepôt")->component('columns.common.show-title-link'),
            Column::make('address', "Adresse")
        ];
    }

    public function delete(Warehouse $warehouse)
    {
        // $warehouse = Operationwarehouse::find($warehouse);
        $warehouse->delete();
    }
}
