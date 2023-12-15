<?php

namespace Modules\Sales\Livewire\Team;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportNavigate\SupportNavigate;
use Modules\Employee\Entities\Employee;
use Modules\Sales\Entities\SalesTeam;

class Show extends Component
{
    public SalesTeam $team;
    
    public function mount(SalesTeam $team){

        $this->team = $team;
    }
    public function render()
    {
        return view('sales::livewire.team.show')
        ->extends('layouts.master');
    }

}
