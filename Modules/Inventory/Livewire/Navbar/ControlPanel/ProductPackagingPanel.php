<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;

class ProductPackagingPanel extends ControlPanel
{

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = "Conditionnements produits";
        $this->new = route('inventory.products.packaging.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
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
