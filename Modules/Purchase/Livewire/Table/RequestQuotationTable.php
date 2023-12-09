<?php

namespace Modules\Purchase\Livewire\Table;

use Livewire\Component;
use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Purchase\Entities\Request\RequestQuotation;

class RequestQuotationTable extends Table
{

    public function createRoute() : string
    {

        return route('purchases.requests.create', ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('purchases.requests.show', ['request' => $id, 'subdomain' => current_company()->domain_name]);
    }

    public function headerName() : string
    {

        return 'Demandes de prix';
    }

    public function query() : Builder
    {
        return RequestQuotation::query();
    }
    public function columns() : array
    {
        return [
            Column::make('reference', 'Référence')->component('columns.common.show-title-link'),
            Column::make('supplier_reference', 'Référence fournisseur'),
            Column::make('supplier_id', 'Fournisseur')->component('columns.common.supplier'),
            Column::make('buyer_id', 'Acheteur')->component('columns.common.buyer'),
            Column::make('deadline_date', 'Echéance de commande')->component('columns.common.human-diff'),
            Column::make('source_document', 'Document source'),
            Column::make('total_amount', 'Total')->component('columns.common.format_currency'),
            Column::make('status', "Statut")->component('columns.common.status.quotation-status'),
        ];
    }
}
