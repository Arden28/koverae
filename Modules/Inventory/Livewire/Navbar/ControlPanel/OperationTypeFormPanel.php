<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class OperationTypeFormPanel extends ControlPanel
{
    public $operation;

    public function mount($operation = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($operation){
            $this->operation = $operation;
            $this->currentPage = $operation->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.operation-types.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
