<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class ProductPackagingFormPanel extends  ControlPanel
{
    public $packaging;

    public function mount($packaging = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($packaging){
            $this->packaging = $packaging;
            $this->currentPage = $packaging->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.products.packaging.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
