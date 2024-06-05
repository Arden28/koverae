<?php

namespace Modules\Sales\Livewire\Table;

use App\Livewire\Table\Column;
use App\Livewire\Table\Table;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesTeam;

class SalesTeamTable extends Table
{

    public function createRoute() : string
    {

        return route('sales.teams.create' , ['subdomain' => current_company()->domain_name, 'menu' => current_menu() ]);
    }

    public function showRoute($id) : string
    {

        return route('sales.teams.show' , ['subdomain' => current_company()->domain_name, 'team' => $id, 'menu' => current_menu() ]);
    }

    public function emptyTitle() : string
    {
        return __('translator::sales.table.team.empty.title');
    }

    public function emptyText() : string
    {
        return __('translator::sales.table.team.empty.title');
    }

    public function headerName() : string
    {

        return 'Equipes commerciales';
    }

    public function query() : Builder
    {
        return SalesTeam::query();
    }

    public function columns() : array
    {
        return [
            Column::make('name', __('translator::sales.table.team.name'))->component('columns.common.show-title-link'),
            Column::make('email_alias', __('translator::sales.table.team.alias')),
            Column::make('team_leader_id', __('translator::sales.table.team.leader'))->component('columns.common.sales.sales-team-leader'),
            Column::make('invoice_target', __('translator::sales.table.team.goal'))->component('columns.common.format_currency'),
        ];
    }

    public function delete(SalesTeam $team)
    {
        // $quotation = Quotation::find($quotation);
        $team->delete();
    }
}
