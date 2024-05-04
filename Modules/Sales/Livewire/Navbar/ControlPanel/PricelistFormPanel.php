<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\Button\ActionButton;
use App\Livewire\Navbar\ControlPanel;

class PricelistFormPanel extends ControlPanel
{
    public $pricelist;

    public function mount($pricelist = null, $event = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;
        $this->event = $event;

        if($pricelist){
            $this->pricelist = $pricelist;
            $this->currentPage = $pricelist->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        if(settings()->has_pricelist_check){
            $this->new = route('sales.pricelists.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        }
    }
}
