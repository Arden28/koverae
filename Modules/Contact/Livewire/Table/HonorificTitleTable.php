<?php

namespace Modules\Contact\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\HonorificTitle;

class HonorificTitleTable extends Table
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
        return __("translator::contacts.table.honorific.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::contacts.table.honorific.empty.text');
    }


    public function query() : Builder
    {
        return HonorificTitle::query();
    }
    public function columns() : array
    {
        return [
            Column::make('title', __('translator::contacts.table.honorific.title')),
            Column::make('abbreviation', __('translator::contacts.table.honorific.abbreviation')),
        ];
    }
}
