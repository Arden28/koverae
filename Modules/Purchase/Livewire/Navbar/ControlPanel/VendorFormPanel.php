<?php

namespace Modules\Purchase\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class VendorFormPanel extends ControlPanel
{
    public $supplier;

    public function mount($supplier = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($supplier){
            $this->supplier = $supplier;
            $this->currentPage = $supplier->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('purchases.vendors.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
