<?php

namespace Modules\Manufacturing\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class BomPanel extends ControlPanel
{
    // public $product;

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = "Nomenclatures";
        $this->new = route('manufacturing.boms.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
