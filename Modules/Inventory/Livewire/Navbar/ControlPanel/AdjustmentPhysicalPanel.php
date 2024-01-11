<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class AdjustmentPhysicalPanel extends ControlPanel
{
    // public $product;

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = "Ajustements d'inventaire";
        $this->new = route('inventory.adjustments.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
