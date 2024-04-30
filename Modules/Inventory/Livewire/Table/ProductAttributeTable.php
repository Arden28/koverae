<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Product\Variant\Attribute;

class ProductAttributeTable extends Table
{
    public function emptyTitle() : string
    {
        return __("Créez des attributs pour vos produits");
    }

    public function emptyText() : string
    {
        return __("Vendez des variantes d'un produit en utilisant des attributs (taille, couleur, etc.)");
    }

    public function headerName() : string
    {

        return "Conditionnements produits";
    }

    public function query() : Builder
    {
        return Attribute::query();
    }

    public function showRoute($id) : string
    {

        return route('inventory.products.attributes.show' , ['subdomain' => current_company()->domain_name, 'attribute' => $id, 'menu' => current_menu() ]);
    }

    public function columns() : array
    {
        return [
            Column::make('name', "Attribut")->component('columns.common.show-title-link'),
            Column::make('display_type', "Type d'affichage"),
            Column::make('variant_method', "Mode de création des variantes"),
        ];
    }
}
