<?php

namespace Modules\Contact\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Bank\Bank;

class BanksTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.banks.create', ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.banks.show', ['bank' => $id, 'subdomain' => current_company()->domain_name]);
    }

    public function headerName() : string
    {

        return 'Banques';
    }

    public function query() : Builder
    {
        return Bank::query();
    }
    public function columns() : array
    {
        return [
            Column::make('name', 'Nom'),
            Column::make('bic', "Code d'identification bancaire"),
            Column::make('country', 'Pays'),
        ];
    }
}
