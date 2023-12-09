<?php

namespace Modules\Contact\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Bank\Bank;
use Modules\Contact\Entities\Bank\BankAccount;

class BanksAccountTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.banks.accounts.create', ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.banks.accounts.show', ['bank' => $id, 'subdomain' => current_company()->domain_name]);
    }

    public function headerName() : string
    {

        return 'Comptes Bancaires';
    }

    public function query() : Builder
    {
        return BankAccount::with('bank')
            ->select('bank_accounts.*');
    }
    public function columns() : array
    {
        return [
            Column::make('account_number', 'Numéro du compte'),
            Column::make('bank_accounts.name', "Banque"),
            Column::make('account_holder_name', 'Titulaire du compte'),
        ];
    }
}
