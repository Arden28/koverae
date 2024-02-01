<?php

namespace Modules\Purchase\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class RequestQuotationFormPanel extends ControlPanel
{
    public $request;

    public function mount($request = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($request){
            $this->request = $request;
            $this->currentPage = $request->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('purchases.requests.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
