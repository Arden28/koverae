<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class SaleTeamFormPanel extends ControlPanel
{
    public $team;

    public function mount($team = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($team){
            $this->team = $team;
            $this->currentPage = $team->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('sales.teams.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
