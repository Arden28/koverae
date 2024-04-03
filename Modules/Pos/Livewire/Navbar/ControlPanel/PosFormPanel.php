<?php

namespace Modules\Pos\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class PosFormPanel extends ControlPanel
{
    public $pos;

    public function mount($pos = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($pos){
            $this->pos = $pos;
            $this->currentPage = $pos->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('pos.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
