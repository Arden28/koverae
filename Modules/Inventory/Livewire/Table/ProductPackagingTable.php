<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Product\ProductPackaging;

class ProductPackagingTable extends Table
{
    public function emptyTitle() : string
    {
        return __("Créer un emballage produit");
    }

    public function emptyText() : string
    {
        return __("Gérer les conditionnements de produits (exemples: pack de 6 bouteilles, boîte de 10 pièces)");
    }

    public function headerName() : string
    {

        return "Conditionnements produits";
    }

    public function query() : Builder
    {
        return ProductPackaging::query();
    }

    public function showRoute($id) : string
    {

        return route('inventory.products.packaging.show' , ['subdomain' => current_company()->domain_name, 'packaging' => $id, 'menu' => current_menu() ]);
    }

    public function columns() : array
    {
        return [
            Column::make('product_id', "Nom du produit")->component('columns.common.product'),
            Column::make('name', "Conditionnement")->component('columns.common.show-title-link'),
            Column::make('packet_type_id', "Type de colis"),
            Column::make('contained_quantity', "Quantité contenue"),
            Column::make('product_barcode_symbology', "Code-barres"),
            Column::make('is_saleable', "Ventes")->component('columns.common.checkbox'),
            Column::make('is_buyable', "Achats")->component('columns.common.checkbox'),
        ];
    }

}
