<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class ProductSerialNumberFormPanel extends  ControlPanel
{
    public $lot;

    public function mount($lot = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($lot){
            $this->lot = $lot;
            $this->currentPage = $lot->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.products.serials.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);

    }

}
