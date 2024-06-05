<?php

namespace Modules\Sales\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entities\Sale;

class SalesTable extends Table
{

    public function createRoute() : string
    {

        return route('sales.quotations.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('sales.show' , ['subdomain' => current_company()->domain_name, 'sale' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __('translator::sales.table.sale.empty_title');
    }

    public function emptyText() : string
    {
        return __('translator::sales.table.sale.empty.text');
    }

    public function headerName() : string
    {

        return 'Bon de commande';
    }

    public function query() : Builder
    {
        return Sale::query();
    }

    public function columns() : array
    {
        return [
            Column::make('reference', __('translator::sales.table.sale.reference'))->component('columns.common.show-title-link'),
            Column::make('date', __('translator::sales.table.sale.date'))->component('columns.common.date.simple'),
            Column::make('shipping_date', __('translator::sales.table.sale.shipping_date'))->component('columns.common.date.simple'),
            Column::make('customer_id', __('translator::sales.table.sale.customer'))->component('columns.common.customer'),
            Column::make('seller_id', __('translator::sales.table.sale.seller'))->component('columns.common.seller'),
            Column::make('sales_team_id', __('translator::sales.table.sale.sale_team'))->component('columns.common.sales-team'),
            Column::make('total_amount', __('translator::sales.table.sale.total'))->component('columns.common.format_currency'),
            Column::make('status', __('translator::sales.table.sale.status'))->component('columns.common.status.quotation-status'),
            Column::make('invoice_status', __('translator::sales.table.sale.invoice_status'))->component('columns.common.status.sale-invoice-status'),
            Column::make('shipping_status', __('translator::sales.table.sale.shipping_status'))->component('columns.common.status.shipping-status'),
            // Column::make('due_amount', 'Montant à facturer')->component('columns.common.format_currency'),
        ];
    }

    public function delete(Sale $quotation)
    {
        // $quotation = Quotation::find($quotation);
        $quotation->delete();
    }
}