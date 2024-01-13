<?php

namespace Modules\Contact\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Industrie;

class IndustriesTable extends Table
{

    public function createRoute() : string
    {

        return "#";
    }

    public function showRoute($id) : string
    {

        return "#";
    }

    public function headerName() : string
    {

        return 'Titres honorifiques';
    }

    public function query() : Builder
    {
        return Industrie::query();
    }
    public function columns() : array
    {
        return [
            Column::make('name', 'Industrie'),
            Column::make('full_name', "Nom complet"),
        ];
    }
}
