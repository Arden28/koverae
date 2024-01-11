<?php

namespace Modules\Purchase\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class PurchaseFormPanel extends ControlPanel
{
    public $purchase;

    public function mount($purchase = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($purchase){
            $this->purchase = $purchase;
            $this->currentPage = $purchase->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('purchases.requests.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
