<?php

namespace Modules\Employee\Livewire\Job;

use Livewire\Component;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\JobType;

class Create extends Component
{
        public function render()
    {
        return view('employee::livewire.job.create')
        ->extends('layouts.master');
    }

}
