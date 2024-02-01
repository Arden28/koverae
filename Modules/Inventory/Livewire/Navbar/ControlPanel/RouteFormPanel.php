<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class RouteFormPanel extends ControlPanel
{
    public $route;

    public function mount($route = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($route){
            $this->route = $route;
            $this->currentPage = $route->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        // $this->new = route('inventory.warehouses.routes.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
