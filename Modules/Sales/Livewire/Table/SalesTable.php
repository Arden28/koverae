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
        return __("Créez un nouveau devis, la première étape d'une vente !");
    }

    public function emptyText() : string
    {
        return __('Une fois le devis confirmé par le client, il devient un bon de commande.
        Vous pourrez créer une facture et encaisser le paiement.');
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
            Column::make('reference', 'Référence')->component('columns.common.show-title-link'),
            Column::make('date', 'Date de la commande')->component('columns.common.date.simple'),
            Column::make('shipping_date', 'Date de livraison')->component('columns.common.date.simple'),
            Column::make('customer_id', 'Client')->component('columns.common.customer'),
            Column::make('seller_id', 'Commercial')->component('columns.common.seller'),
            Column::make('sales_team_id', 'Equipe commerciale')->component('columns.common.sales-team'),
            Column::make('total_amount', 'Total')->component('columns.common.format_currency'),
            Column::make('status', 'Statut')->component('columns.common.status.quotation-status'),
            Column::make('status', 'Statut de la facture')->component('columns.common.status.sale-invoice-status'),
            Column::make('shipping_status', 'Statut de la livraison')->component('columns.common.status.shipping-status'),
            Column::make('due_amount', 'Montant à facturer')->component('columns.common.format_currency'),
        ];
    }

    public function delete(Sale $quotation)
    {
        // $quotation = Quotation::find($quotation);
        $quotation->delete();
    }
}
