<?php

namespace Modules\Manufacturing\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class ManufacturingOrderFormPanel extends ControlPanel
{
    public $order;

    public function mount($order = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($order){
            $this->order = $order;
            $this->currentPage = $order->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('manufacturing.orders.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
