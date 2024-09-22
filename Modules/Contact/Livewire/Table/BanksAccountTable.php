<?php

namespace Modules\Contact\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Bank\Bank;
use Modules\Contact\Entities\Bank\BankAccount;

class BanksAccountTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.banks.accounts.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.banks.accounts.show', ['account' => $id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function emptyTitle() : string
    {
        return __("translator::contacts.table.bank-account.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::contacts.table.bank-account.empty.text');
    }

    public function query() : Builder
    {
        return BankAccount::with('bank')
            ->select('bank_accounts.*');
    }
    public function columns() : array
    {
        return [
            Column::make('account_number', __('translator::contacts.table.bank-account.no'))->component('table.column.special.show-title-link'),
            Column::make('bank_id', __('translator::contacts.table.bank-account.bank'))->component('table.column.special.bank.simple'),
            Column::make('account_holder_name', __('translator::contacts.table.bank-account.holder'))->component('table.column.special.contact.simple'),
        ];
    }
}
