<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;

class PricelistPanel extends ControlPanel
{

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = __('translator::sales.control.pricelist.current_page_list');
        if(settings()->has_pricelist_check){
            $this->new = route('sales.pricelists.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        }
    }


    public function switchButtons() : array
    {
        return  [
            // make($key, $label)
            SwitchButton::make('lists',"changeView('lists')", "bi-list-task"),
            SwitchButton::make('kanban',"changeView('lists')", "bi-kanban"),
            // SwitchButton::make('delivery_lead_time',"Delais de livraison", ''),
        ];
    }
}
