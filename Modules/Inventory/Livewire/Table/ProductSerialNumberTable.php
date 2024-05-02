<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Modules\Inventory\Entities\Product\Serial\SerialNumber;

class ProductSerialNumberTable extends Table
{

    public function emptyTitle() : string
    {
        return __("Ajouter un lot/numéro de série");
    }

    public function emptyText() : string
    {
        return __("Les lots ou numéros de série vous permettent de tracer vos produits. A partir de leur rapport de traçabilité, vous verrez l'historique complet de leur usage, ainsi que leur composition.");
    }

    public function headerName() : string
    {

        return "Lots/Numéros de série";
    }

    public function query() : Builder
    {
        return SerialNumber::query();
    }

    public function columns() : array
    {
        return [
            Column::make('reference', "Lot/numéro de série")->component('columns.common.show-title-link'),
            Column::make('product_id', "Produit")->component('columns.common.product'),
            Column::make('created_at', "Créé le")->component('columns.common.date.timestamps'),
            Column::make('alert_date', "Date d'alerte")->component('columns.common.date.timestamps'),
            Column::make('best_use_date', "Date limite d'usage optimal")->component('columns.common.date.timestamps'),
            Column::make('collection_date', "Date d'enlèvement")->component('columns.common.date.timestamps'),
            Column::make('expiration_date', "Date d'expiration")->component('columns.common.date.timestamps'),
            Column::make('in_direction_to', "Transférer vers"),
            Column::make('quantity', "Quantité en stock"),
        ];
    }

    public function showRoute($id) : string
    {

        return route('inventory.products.serials.show' , ['subdomain' => current_company()->domain_name, 'lot' => $id, 'menu' => current_menu() ]);
    }

}
