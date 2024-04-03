<?php

namespace Modules\Manufacturing\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class ManufacturingOrderPanel extends ControlPanel
{
    // public $product;

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = "Ordres de fabrications";
        $this->new = route('manufacturing.orders.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
