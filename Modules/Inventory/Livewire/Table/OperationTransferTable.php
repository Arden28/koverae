<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Operation\OperationTransfer;

class OperationTransferTable extends Table
{

    public function createRoute() : string
    {

        return route('inventory.operation-transfers.create' , ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.operation-transfers.show' , ['subdomain' => current_company()->domain_name, 'transfer' => $id ]);
    }

    public function headerName() : string
    {

        return "Opérations de transferts";
    }

    public function query() : Builder
    {
        return OperationTransfer::query();
    }

    public function columns() : array
    {
        return [
            Column::make('reference', "Référence")->component('columns.common.show-title-link'),
            Column::make('received_from', "En provenance de ")->component('columns.common.operation.location'),
            Column::make('in_direction_to', "En direction de")->component('columns.common.operation.location'),
            Column::make('responsible_id', "Responsable")->component('columns.common.customer'),
            Column::make('schedule_date', "Date préfue")->component('columns.common.date.basic'),
            Column::make('source_document', "Document d'origine"),
            Column::make('status', "Statut")->component('columns.common.operation.status'),
        ];
    }

    public function delete(OperationTransfer $type)
    {
        // $type = OperationType::find($type);
        $type->delete();
    }
}
