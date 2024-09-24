<?php

namespace Modules\Invoicing\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Invoicing\Entities\Payment\PaymentTerm;

class PaymentTermTable extends Table
{

    public function createRoute() : string
    {

        return route('invoices.payment-terms.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('invoices.payment-terms.show' , ['subdomain' => current_company()->domain_name, 'term' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __("translator::invoicing.table.payment-term.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::invoicing.table.payment-term.empty.text');
    }
    public function query() : Builder
    {
        return PaymentTerm::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', __('translator::invoicing.table.payment-term.name'))->component('columns.common.show-title-link'),
            // Column::make('created_at', 'Rejoinds depuis')->component('columns.common.human-diff'),
        ];
    }
}
