<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class LocationFormPanel extends ControlPanel
{
    public $location;

    public function mount($location = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($location){
            $this->location = $location;
            $this->currentPage = $location->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.locations.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
