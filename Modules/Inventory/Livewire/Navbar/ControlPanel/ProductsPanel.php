<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;

class ProductsPanel extends ControlPanel
{
    // public $product;

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage =  __('translator::inventory.control.product.current_page_list');
        $this->new = route('inventory.products.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
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