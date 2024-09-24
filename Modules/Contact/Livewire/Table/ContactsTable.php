<?php

namespace Modules\Contact\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Contact;

class ContactsTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __("translator::contacts.table.customer.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::contacts.table.customer.empty.text');
    }
    public function query() : Builder
    {
        return Contact::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', __('translator::contacts.table.customer.name'))->component('columns.common.show-title-link'),
            Column::make('phone', __('translator::contacts.table.customer.phone')),
            Column::make('email', __('translator::contacts.table.customer.email')),
            Column::make('city', __('translator::contacts.table.customer.city')),
            Column::make('country_id', __('translator::contacts.table.customer.country'))->component('table.column.special.country.simple'),
            // Column::make('created_at', 'Rejoinds depuis')->component('columns.common.human-diff'),
        ];
    }
}
