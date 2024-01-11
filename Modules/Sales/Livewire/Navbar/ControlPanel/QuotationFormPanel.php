<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class QuotationFormPanel extends ControlPanel
{
    public $quotation;

    public function mount($quotation = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($quotation){
            $this->quotation = $quotation;
            $this->currentPage = $quotation->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('sales.quotations.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
