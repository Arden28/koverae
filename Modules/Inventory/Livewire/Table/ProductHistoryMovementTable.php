<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\History\InventoryMove;
use Modules\Inventory\Entities\Product;

class ProductHistoryMovementTable extends Table
{

    public function emptyTitle() : string
    {
        return __("Aucun mouvement détecté");
    }

    public function emptyText() : string
    {
        return __("Veuillez d'abord effectuer des mouvements de stocks, afin de les consulter et les analyser.");
    }

    public function query() : Builder
    {
        return InventoryMove::query();
    }

    public function columns() : array
    {
        return [
            Column::make('date', "Date")->component('columns.common.date.basic'),
            Column::make('reference', "Référence"),
            Column::make('product_name', "Produit"),
            Column::make('source_location_id', "En provenance de ")->component('columns.common.operation.location'),
            Column::make('destination_location_id', "En direction de")->component('columns.common.operation.location'),
            Column::make('demand', "Quantité"),
            Column::make('uom_id', "Unité"),
            Column::make('responsible_id', "Responsable")->component('columns.common.customer'),
            Column::make('source_document', "Document d'origine"),
            Column::make('status', "Statut")->component('columns.common.operation.status'),
        ];
    }
}
