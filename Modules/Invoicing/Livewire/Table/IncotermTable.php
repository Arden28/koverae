<?php

namespace Modules\Invoicing\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Invoicing\Entities\Incoterm;

class IncotermTable extends Table
{

    public function emptyTitle() : string
    {
        return __("translator::invoicing.table.incoterm.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::invoicing.table.incoterm.empty.text');
    }
    public function query() : Builder
    {
        return Incoterm::query();
    }

    public function columns() : array
    {
        return [
            Column::make('code', __('translator::invoicing.table.incoterm.code')),
            Column::make('name', __('translator::invoicing.table.incoterm.name'))
        ];
    }
}
