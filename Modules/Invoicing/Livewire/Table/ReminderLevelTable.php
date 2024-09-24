<?php

namespace Modules\Invoicing\Livewire\Table;

use Modules\App\Livewire\Components\Table\Column;
use Modules\App\Livewire\Components\Table\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Invoicing\Entities\Reminder\ReminderLevel;

class ReminderLevelTable extends Table
{

    public function createRoute() : string
    {

        return route('invoices.reminder-levels.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('invoices.reminder-levels.show' , ['subdomain' => current_company()->domain_name, 'level' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __("translator::invoicing.table.reminder-level.empty.title");
    }

    public function emptyText() : string
    {
        return __('translator::invoicing.table.reminder-level.empty.text');
    }
    public function query() : Builder
    {
        return ReminderLevel::query();
    }

    public function columns() : array
    {
        return [
            Column::make('description', __('translator::invoicing.table.reminder-level.name'))->component('columns.common.show-title-link'),
            Column::make('days_after_due', __('translator::invoicing.table.reminder-level.days')),
        ];
    }
}
