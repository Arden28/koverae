<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class SalesProgramFormPanel extends ControlPanel
{
    public $program;

    public function mount($program = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($program){
            $this->program = $program;
            $this->currentPage = $program->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('sales.programs.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
