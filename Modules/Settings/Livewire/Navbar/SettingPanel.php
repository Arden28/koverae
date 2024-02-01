<?php

namespace Modules\Settings\Livewire\Navbar;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\Template\Simple;
use Livewire\Component;

class SettingPanel extends Simple
{

    public function mount()
    {
        $this->currentPage = "Paramètres";
    }
}
