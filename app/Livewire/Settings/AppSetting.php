<?php

namespace App\Livewire\Settings;

use Livewire\Component;

abstract class AppSetting extends Component
{
    public function render()
    {
        return view('livewire.settings.app-setting');
    }

    public function blocks() : array{
        return [];
    }

    public function boxes() : array{
        return [];
    }
}
