<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
class ScrapFormPanel extends ControlPanel
{
    public $scrap;

    public function mount($scrap = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($scrap){
            $this->scrap = $scrap;
            $this->currentPage = $scrap->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.adjustments.scraps.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
