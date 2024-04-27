<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Product;

class ProductQuantityTable extends Table
{

    public function query() : Builder
    {
        return Product::query();
    }

    public function columns() : array
    {
        return [
            Column::make('location_id', "Emplacement"),
            Column::make('product_name', "Produit"),
            Column::make('category_id', "Catégorie du Produit")->component('columns.common.product.category'),
            Column::make('product_quantity', "Quantité en stock"),
            Column::make('product_reserved_qty', "Quantité réservée"),
            Column::make('uom_id', "Unité"),
            Column::make('product_price', "Valeur")->component('columns.common.product.format_currency'),
        ];
    }
}
