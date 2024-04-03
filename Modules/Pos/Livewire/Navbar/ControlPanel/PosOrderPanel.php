<?php

namespace Modules\Pos\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;

class PosOrderPanel extends ControlPanel
{

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = "Commandes";
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

}
