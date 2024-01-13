<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class SaleFormPanel extends ControlPanel
{
    public $sale;

    public function mount($sale = null, $event)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;
        $this->event = $event;

        if($sale){
            $this->sale = $sale;

            $this->currentPage = $sale->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('sales.quotations.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
