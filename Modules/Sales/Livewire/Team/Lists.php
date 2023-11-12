<?php

namespace Modules\Sales\Livewire\Team;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Sales\Entities\SalesTeam;

class Lists extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 10;  // Default number of employees to show

    public $selectedSalesTeams = []; //Checkbox select

    public $deleteId = '';

    public function changeView($view){
        $this->view = $view;
    }

    public function render()
    {
        $salesTeams = SalesTeam::isCompany(current_company()->id)->paginate($this->show);
        return view('sales::livewire.team.lists', compact('salesTeams'))
        ->extends('layouts.master');
    }


    public function destroy(SalesTeam $team) {
        // abort_if(Gate::denies('delete_teams'), 403);

        $team->delete();

        notify()->success("L'équipe a bien été supprimée !', 'warning");

    }
}
