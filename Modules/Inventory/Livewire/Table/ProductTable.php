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
        return __('translator::inventory.table.product.empty.title');
    }

    public function emptyText() : string
    {
        return __('translator::inventory.table.product.empty.text');
    }

    public function headerName() : string
    {

        return "Products";
    }

    public function query() : Builder
    {
        return Product::query();
    }

    public function columns() : array
    {
        return [
            Column::make('product_name', __('translator::inventory.table.product.name'))->component('columns.common.show-title-link'),
            Column::make('product_internal_reference', __('translator::inventory.table.product.internal-reference')),
            Column::make('category_id', __('translator::inventory.table.product.category'))->component('columns.common.product.category'),
            Column::make('product_barcode_symbology', __('translator::inventory.table.product.barcode')),
            Column::make('responsible_id', __('translator::inventory.table.product.responsible'))->component('columns.common.product.responsible'),
            Column::make('product_price', __('translator::inventory.table.product.price'))->component('columns.common.product.format_currency'),
            Column::make('product_cost', __('translator::inventory.table.product.cost'))->component('columns.common.product.format_currency'),
            Column::make('product_type', __('translator::inventory.table.product.type'))->component('columns.common.product.type'),
            Column::make('product_quantity', __('translator::inventory.table.product.quantity')),
        ];
    }

    public function delete(Product $product)
    {
        // $product = OperationType::find($product);
        $product->delete();
    }
}