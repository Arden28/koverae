<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;
use Livewire\Attributes\Url;

class OperationTransferPanel extends ControlPanel
{
    #[Url(as : 'type')]
    public $type;
    // public $product;

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = $this->type ? transfer_type($this->type) : "Transferts";
        $this->new = route('inventory.operation-transfers.create', ['subdomain' => current_company()->domain_name, 'type' => $this->type, 'menu' => current_menu()]);
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
