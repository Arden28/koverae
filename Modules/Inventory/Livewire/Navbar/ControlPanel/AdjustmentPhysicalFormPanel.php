<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class AdjustmentPhysicalFormPanel extends ControlPanel
{
    public $adjustment;

    public function mount($adjustment = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($adjustment){
            $this->adjustment = $adjustment;
            $this->currentPage = $adjustment->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.adjustments.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

}
