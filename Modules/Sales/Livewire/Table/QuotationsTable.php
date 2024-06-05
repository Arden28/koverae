<?php

namespace Modules\Sales\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entities\Quotation\Quotation;

class QuotationsTable extends Table
{

    public function createRoute() : string
    {

        return route('sales.quotations.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {
        return route('sales.quotations.show' , ['subdomain' => current_company()->domain_name, 'quotation' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __('translator::sales.table.quotation.empty.title');
    }

    public function emptyText() : string
    {
        return __(__('translator::sales.table.quotation.empty.text'));
    }

    public function headerName() : string
    {
        return 'Devis';
    }

    public function query() : Builder
    {
        return Quotation::query();
    }

    public function columns() : array
    {
        return [
            Column::make('reference', __('translator::sales.table.quotation.reference'))->component('columns.common.show-title-link'),
            Column::make('date', __('translator::sales.table.quotation.date'))->component('columns.common.date.basic'),
            Column::make('expected_date', __('translator::sales.table.quotation.due_date'))->component('columns.common.human-diff'),
            Column::make('shipping_date', __('translator::sales.table.quotation.shipping_date'))->component('columns.common.date.simple'),
            Column::make('customer_id', __('translator::sales.table.quotation.customer'))->component('columns.common.customer'),
            Column::make('seller_id', __('translator::sales.table.quotation.seller'))->component('columns.common.seller'),
            Column::make('sales_team_id', __('translator::sales.table.quotation.sale_team'))->component('columns.common.sales-team'),
            Column::make('total_amount', __('translator::sales.table.quotation.total'))->component('columns.common.format_currency'),
            Column::make('status', __('translator::sales.table.quotation.status'))->component('columns.common.status.quotation-status'),
        ];
    }

    public function delete(Quotation $quotation)
    {
        // $quotation = Quotation::find($quotation);
        $quotation->delete();
    }
}