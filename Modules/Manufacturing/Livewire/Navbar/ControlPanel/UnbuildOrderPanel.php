<?php

namespace Modules\Manufacturing\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;

class UnbuildOrderPanel extends ControlPanel
{

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = "Ordres de déconstruction";
        // $this->new = route('manufacturing.unbuilds.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }


    public function switchButtons() : array
    {
        return  [
            // make($key, $label)
            SwitchButton::make('lists',"", "bi-list-task"),
            SwitchButton::make('kanban',"", "bi-kanban"),
            // SwitchButton::make('delivery_lead_time',"Delais de livraison", ''),
        ];
    }
}
