<?php

namespace Modules\User\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class UsersTable extends Table
{


    public function createRoute() : string
    {

        return route('contacts.banks.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.banks.show', ['bank' => $id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    public function headerName() : string
    {

        return 'Demandes';
    }

    public function query() : Builder
    {
        return User::query();
    }
    public function columns() : array
    {
        return [
            Column::make('name', 'Nom'),
            Column::make('phone', "Login"),
            Column::make('locale', 'Langue'),
            Column::make('last_logged_in_at', 'Dernière connexion'),
            Column::make('status', 'Statut'),
        ];
    }
}
