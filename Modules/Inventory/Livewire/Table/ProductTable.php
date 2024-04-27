<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Product;

class ProductTable extends Table
{

    // public function createRoute() : string
    // {

    //     return route('inventory.products.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    // }

    public function showRoute($id) : string
    {

        return route('inventory.products.show' , ['subdomain' => current_company()->domain_name, 'product' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __("Créer un nouveau produit");
    }

    public function emptyText() : string
    {
        return __('Vous devez définir un produit pour tout ce que vous vendez ou achetez, que ce soit un produit stockable, consommable ou un service.');
    }

    public function headerName() : string
    {

        return "Produits";
    }

    public function query() : Builder
    {
        return Product::query();
    }

    public function columns() : array
    {
        return [
            Column::make('product_name', "Nom du produit")->component('columns.common.show-title-link'),
            Column::make('product_internal_reference', "Référence interne"),
            Column::make('category_id', "Catégorie")->component('columns.common.product.category'),
            Column::make('product_barcode_symbology', "Code-barres"),
            Column::make('responsible_id', "Responsable")->component('columns.common.product.responsible'),
            Column::make('product_price', "Prix de vente")->component('columns.common.product.format_currency'),
            Column::make('product_cost', "Coût")->component('columns.common.product.format_currency'),
            Column::make('product_type', "Type de produit")->component('columns.common.product.type'),
            Column::make('product_quantity', "En stock"),
        ];
    }

    public function delete(Product $product)
    {
        // $product = OperationType::find($product);
        $product->delete();
    }
}
