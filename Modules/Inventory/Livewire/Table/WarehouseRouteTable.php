<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Warehouse\WarehouseRoute;

class WarehouseRouteTable extends Table
{

    public function createRoute() : string
    {

        return route('inventory.warehouses.create' , ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.warehouses.routes.show' , ['subdomain' => current_company()->domain_name, 'route' => $id ]);
    }

    public function headerName() : string
    {

        return "Routes";
    }

    public function query() : Builder
    {
        return WarehouseRoute::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', "Route")->component('columns.common.show-title-link'),
        ];
    }

    public function delete(WarehouseRoute $route)
    {
        // $route = Operationwarehouse::find($route);
        $route->delete();
    }
}
