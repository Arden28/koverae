<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class RoutePanel extends ControlPanel
{
    // public $product;

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = 'Routes';
        // $this->new = route('inventory.warehouses.route.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
