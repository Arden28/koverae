<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class WarehouseFormPanel extends ControlPanel
{
    public $warehouse;

    public function mount($warehouse = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($warehouse){
            $this->warehouse = $warehouse;
            $this->currentPage = $warehouse->short_name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.warehouses.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
