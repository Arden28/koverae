<?php

namespace Modules\Employee\Livewire\Workplace;

use Livewire\Component;
use Modules\Employee\Entities\Workplace;

class Create extends Component
{

    public function render()
    {
        return view('employee::livewire.workplace.create')
        ->extends('layouts.master');
    }
}
