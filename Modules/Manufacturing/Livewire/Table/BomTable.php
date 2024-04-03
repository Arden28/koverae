<?php

namespace Modules\Manufacturing\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;

class BomTable extends Table
{

    public function createRoute() : string
    {

        return route('manufacturing.boms.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('manufacturing.boms.show' , ['subdomain' => current_company()->domain_name, 'bom' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return "Nomenclatures";
    }

    public function query() : Builder
    {
        return BillOfMaterial::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', "Nom")->component('columns.common.show-title-link'),
            Column::make('product_id', "Produit")->component('columns.common.product'),
            Column::make('reference', "Référence")->component('columns.common.show-title-link'),
            Column::make('bom_type', "Type de nomenclature")->component('columns.common.bom-type'),
            Column::make('quantity', "Quantité"),
        ];
    }

    public function delete(BillOfMaterial $bom)
    {
        $bom->delete();
    }
}
