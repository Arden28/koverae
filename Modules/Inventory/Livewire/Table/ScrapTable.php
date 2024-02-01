<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Adjustment\ScrapOrder;

class ScrapTable extends Table
{

    public function createRoute() : string
    {

        return route('inventory.adjustments.scraps.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.adjustments.scraps.show' , ['subdomain' => current_company()->domain_name, 'scrap' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Ordres de rebuts";
    }

    public function query() : Builder
    {
        return ScrapOrder::query();
    }

    public function columns() : array
    {
        return [
            Column::make('reference', "Référence")->component('columns.common.show-title-link'),
            Column::make('date', "Date")->component('columns.common.operation.location'),
            Column::make('product_id', "Produit")->component('columns.common.operation.location'),
            Column::make('quantity', "Quantité")->component('columns.common.customer'),
            Column::make('received_from', "Emplacement d'origine")->component('columns.common.date.basic'),
            Column::make('in_direction_to', "Emplacement de rebut"),
            Column::make('status', "Statut")->component('columns.common.operation.status'),
        ];
    }

    public function delete(ScrapOrder $scrap)
    {
        // $scrap = Operationscrap::find($scrap);
        $scrap->delete();
    }
}
