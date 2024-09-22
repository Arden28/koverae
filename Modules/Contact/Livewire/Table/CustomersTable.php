<?php

namespace Modules\Contact\Livewire\Table;


use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Contact;

class CustomersTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $id, 'menu' => current_menu() ]);
    }

    public function headerName() : string
    {

        return 'Fournisseurs';
    }

    public function query() : Builder
    {
        return Contact::isCustomer();
    }

    public function columns() : array
    {
        return [
            Column::make('name', 'Nom')->component('columns.common.show-title-link'),
            Column::make('phone', 'Télephone'),
            Column::make('email', 'Email'),
            Column::make('city', 'Ville'),
            Column::make('country', 'Pays'),
            Column::make('created_at', 'Rejoinds depuis')->component('columns.common.human-diff'),
        ];
    }
}
