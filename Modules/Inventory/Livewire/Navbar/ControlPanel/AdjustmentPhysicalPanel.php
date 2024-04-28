<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class AdjustmentPhysicalPanel extends ControlPanel
{
    public $inputs = [];

    public $i = 1;
    // public $product;

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = "Ajustements d'inventaire";

        // $this->new = route('inventory.adjustments.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        $this->add = __('Nouveau');
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function add()
    {
        $this->inputs[] = ['key' => $this->i++];
        $this->dispatch('add-adjustment', inputs: $this->inputs);
    }

}
