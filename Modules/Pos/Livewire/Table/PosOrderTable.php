<?php

namespace Modules\Pos\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Pos\Entities\Order\PosOrder;

class PosOrderTable extends Table
{

    public function showRoute($id) : string
    {

        return route('pos.orders.show' , ['subdomain' => current_company()->domain_name, 'order' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return 'Commandes';
    }

    public function query() : Builder
    {
        return PosOrder::query();
    }

    public function columns() : array
    {
        return [
            Column::make('reference', 'Référence')->component('columns.common.show-title-link'),
            Column::make('pos_session_id', 'Status')->component('columns.common.pos.session'),
            Column::make('date', 'Date')->component('columns.common.date.timestamps'),
            Column::make('pos_id', 'Point de ventes')->component('columns.common.pos.point-of-sale'),
            Column::make('customer_id', 'Client')->component('columns.common.customer'),
            Column::make('total_amount', 'Total')->component('columns.common.format_currency'),
            Column::make('payment_status', 'Status du paiement')->component('columns.common.pos.pos-order-payment-status'),
        ];
    }

    public function delete(PosOrder $pos)
    {
        // $quotation = Quotation::find($quotation);
        $pos->delete();
    }
}
