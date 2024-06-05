<?php

namespace Modules\Sales\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entities\Price\PriceList;

class PricelistTable extends Table
{

    public function showRoute($id) : string
    {
        return route('sales.pricelists.show' , ['subdomain' => current_company()->domain_name, 'pricelist' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __('translator::sales.table.pricelist.empty.title');
    }

    public function emptyText() : string
    {
        return  __('translator::sales.table.pricelist.empty.text');
    }

    public function headerName() : string
    {
        return 'Listes de prix';
    }

    public function query() : Builder
    {
        return PriceList::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', __('translator::sales.table.pricelist.name'))->component('columns.common.show-title-link'),
            Column::make('discount_policy', __('translator::sales.table.pricelist.policy'))->component('columns.common.pricelist.discount-policy'),
        ];
    }
}