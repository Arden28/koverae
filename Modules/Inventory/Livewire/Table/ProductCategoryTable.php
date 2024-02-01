<?php

namespace Modules\Inventory\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Inventory\Entities\Category;

class ProductCategoryTable extends Table
{

    public function createRoute() : string
    {

        return route('inventory.products.categories.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('inventory.products.categories.show' , ['subdomain' => current_company()->domain_name, 'category' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Catégories de produits";
    }

    public function query() : Builder
    {
        return Category::query();
    }

    public function columns() : array
    {
        return [
            Column::make('category_name', "Nom du produit")->component('columns.common.show-title-link'),
        ];
    }

    public function delete(Category $category)
    {
        // $category = OperationType::find($category);
        $category->delete();
    }
}
