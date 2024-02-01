<?php

namespace Modules\Purchase\Livewire\Table;

use Livewire\Component;
use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Purchase\Entities\Purchase;

class PurchaseTable extends Table
{

    public function createRoute() : string
    {

        return route('purchases.requests.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('purchases.show', ['purchase' => $id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function headerName() : string
    {

        return 'Bon de commande';
    }

    public function query() : Builder
    {
        return Purchase::query();
    }
    public function columns() : array
    {
        return [
            Column::make('reference', 'Référence')->component('columns.common.show-title-link'),
            Column::make('supplier_reference', 'Référence fournisseur'),
            Column::make('supplier_id', 'Fournisseur')->component('columns.common.supplier'),
            Column::make('buyer_id', 'Acheteur')->component('columns.common.buyer'),
            Column::make('expected_arrival_date', 'Arrivée prévue')->component('columns.common.date.timestamps'),
            Column::make('source_document', 'Document source'),
            Column::make('total_amount', 'Total')->component('columns.common.format_currency'),
            Column::make('reception_status', "Statut de la reception")->component('columns.common.status.reception-status'),
            Column::make('invoice_status', "Statut de facturation")->component('columns.common.status.purchase-invoice-status'),
            Column::make('status', "Statut")->component('columns.common.status.quotation-status'),
        ];
    }
}
