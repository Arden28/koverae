<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;
use App\Livewire\Navbar\Button\ActionButton;

class ProductQuantityPanel extends ControlPanel
{

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        // $this->showIndicators = true;

        $this->currentPage = 'Mettre la quatité à jour';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('export', '<i class="bi bi-export"></i> Exporter', 'export-productQuantity'),
            // Add more buttons as needed
        ];
    }

    public function duplicateProduct(){
        $this->dispatch('export-productQuantity', $this->product->id);
    }

}
