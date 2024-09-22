<?php

namespace Modules\Contact\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Localization\Country;

class CountryTable extends Table
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
        return __("translator::contacts.table.country.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::contacts.table.country.empty.text');
    }

    public function query() : Builder
    {
        return Country::query()->orderBy('common_name', 'asc')->take(50);
    }
    public function columns() : array
    {
        return [
            Column::make('common_name', __('translator::contacts.table.country.name')),
            Column::make('country_code', __('translator::contacts.table.country.code')),
        ];
    }
}
