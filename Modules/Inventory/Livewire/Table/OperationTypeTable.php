<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Operation\OperationType;

class OperationTypeTable extends Table
{

    public function createRoute() : string
    {

        return route('inventory.operation-types.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.operation-types.show' , ['subdomain' => current_company()->domain_name, 'type' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Type d'opération";
    }

    public function query() : Builder
    {
        return OperationType::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', "Type d'opération")->component('columns.common.show-title-link')
        ];
    }

    public function delete(OperationType $type)
    {
        // $type = OperationType::find($type);
        $type->delete();
    }
}
