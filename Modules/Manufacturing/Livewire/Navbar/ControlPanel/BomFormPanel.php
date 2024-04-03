<?php

namespace Modules\Manufacturing\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class BomFormPanel extends ControlPanel
{
    public $bom;

    public function mount($bom = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($bom){
            $this->bom = $bom;
            $this->currentPage = $bom->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('manufacturing.boms.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
