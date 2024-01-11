<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class OperationTransferFormPanel extends ControlPanel
{
    public $transfer;

    public function mount($transfer = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($transfer){
            $this->transfer = $transfer;
            $this->currentPage = $transfer->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.operation-transfers.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
