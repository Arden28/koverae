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
        return __("Créez une équipe commerciale et suivez vos performances !");
    }

    public function emptyText() : string
    {
        return __('Créez une équipe commerciale, rajoutez-y des membres et suivez vos performances.');
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
            Column::make('name', 'Nom')->component('columns.common.show-title-link'),
            Column::make('email_alias', 'Alias'),
            Column::make('team_leader_id', "Chef d'équipe")->component('columns.common.sales.sales-team-leader'),
            Column::make('invoice_target', 'Objectif de facturation')->component('columns.common.format_currency'),
        ];
    }

    public function delete(SalesTeam $team)
    {
        // $quotation = Quotation::find($quotation);
        $team->delete();
    }
}

