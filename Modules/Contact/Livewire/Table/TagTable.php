<?php

namespace Modules\Contact\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\ContactTag;

class TagTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.tags.create' , ['subdomain' => current_company()->domain_name ]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.tags.show' , ['subdomain' => current_company()->domain_name, 'tag' => $id ]);
    }

    public function headerName() : string
    {

        return 'Etiquettes';
    }

    public function query() : Builder
    {
        return ContactTag::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', 'Nom')->component('columns.common.show-title-link'),
            Column::make('color', 'Couleur')->component('columns.common.color.simple'),
        ];
    }
}
