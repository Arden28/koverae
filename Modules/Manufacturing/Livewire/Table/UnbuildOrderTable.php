<?php

namespace Modules\Manufacturing\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Manufacturing\Entities\Unbuild\UnbuildOrder;

class UnbuildOrderTable extends Table
{

    public function showRoute($id) : string
    {

        return route('manufacturing.unbuilds.show' , ['subdomain' => current_company()->domain_name, 'order' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Ordres de déconstruction";
    }

    public function emptyTitle() : string
    {
        return __("Aucun ordre de déconstruction trouvé.");
    }

    public function emptyText() : string
    {
        return __("Un ordre de déconstruction est utilisé pour décomposer un produit fini en composants.");
    }

    public function query() : Builder
    {
        return UnbuildOrder::query();
    }

    public function columns() : array
    {
        return [
            Column::make('reference', "Référence")->component('columns.common.show-title-link'),
            Column::make('product_id', "Produit")->component('columns.common.product'),
            Column::make('bom_id', "Nomenclature")->component('columns.common.bom'),
            Column::make('quantity', "Quantité"),
            Column::make('status', 'Status')->component('columns.common.status.manufacturing-order-status'),
        ];
    }
}
