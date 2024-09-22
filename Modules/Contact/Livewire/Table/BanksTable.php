<?php

namespace Modules\Contact\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Bank\Bank;

class BanksTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.banks.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.banks.show', ['bank' => $id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function emptyTitle() : string
    {
        return __("translator::contacts.table.bank.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::contacts.table.bank.empty.text');
    }

    public function query() : Builder
    {
        return Bank::query();
    }
    public function columns() : array
    {
        return [
            Column::make('name', __('translator::contacts.table.bank.name'))->component('columns.common.show-title-link'),
            Column::make('bic', __('translator::contacts.table.bank.bic')),
            Column::make('country_id', __('translator::contacts.table.bank.country'))->component('table.column.special.country.simple'),
        ];
    }
}
