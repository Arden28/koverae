<?php

namespace Modules\Contact\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\ContactTag;

class TagTable extends Table
{

    public function createRoute() : string
    {

        return route('contacts.tags.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('contacts.tags.show' , ['subdomain' => current_company()->domain_name, 'tag' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __("translator::contacts.table.tag.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::contacts.table.tag.empty.text');
    }

    public function query() : Builder
    {
        return ContactTag::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', __('translator::contacts.table.tag.name'))->component('columns.common.show-title-link'),
            Column::make('color', __('translator::contacts.table.tag.color'))->component('columns.common.color.simple'),
        ];
    }
}
