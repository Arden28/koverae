<?php

namespace Modules\Employee\Livewire\Workplace;

use Livewire\Component;

class Lists extends Component
{
    public function render()
    {
        return view('employee::livewire.workplace.lists')
        ->layout('layouts.master');
    }
}
