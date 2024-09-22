<?php

namespace Modules\Contact\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
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

    public function emptyTitle() : string
    {
        return __("translator::contacts.table.industry.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::contacts.table.industry.empty.text');
    }

    public function query() : Builder
    {
        return Industrie::query();
    }
    public function columns() : array
    {
        return [
            Column::make('name', __('translator::contacts.table.industry.name')),
            Column::make('full_name', __('translator::contacts.table.industry.full-name')),
        ];
    }
}
