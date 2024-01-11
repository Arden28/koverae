<?php

namespace Modules\Employee\Livewire\Job;

use Livewire\Component;

class Lists extends Component
{

    public function render()
    {
        return view('employee::livewire.job.lists')
        ->extends('layouts.master');
    }
}
