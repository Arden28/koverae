<?php

namespace Modules\Sales\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entities\Quotation\Quotation;

class QuotationsTable extends Table
{

    public function createRoute() : string
    {

        return route('sales.quotations.create' , ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('sales.quotations.show' , ['subdomain' => current_company()->domain_name, 'quotation' => $id ]);
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
            Column::make('reference', 'Référence')->component('columns.common.show-title-link'),
            Column::make('date', 'Date du devis')->component('columns.common.date.basic'),
            Column::make('expected_date', "Date d'échéance")->component('columns.common.human-diff'),
            Column::make('shipping_date', 'Date de livraison')->component('columns.common.date.simple'),
            Column::make('customer_id', 'Client')->component('columns.common.customer'),
            Column::make('seller_id', 'Commercial')->component('columns.common.seller'),
            Column::make('sales_team_id', 'Equipe commerciale')->component('columns.common.sales-team'),
            Column::make('total_amount', 'Total')->component('columns.common.format_currency'),
            Column::make('status', 'Statut')->component('columns.common.status.quotation-status'),
        ];
    }

    public function delete(Quotation $quotation)
    {
        // $quotation = Quotation::find($quotation);
        $quotation->delete();
    }
}
