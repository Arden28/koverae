<?php

namespace Modules\Employee\Livewire\Job;

use Livewire\Component;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\JobType;

class Show extends Component
{
    public Job $job;

    public function mount($job){
        $this->job = $job;
    }

    public function render()
    {
        return view('employee::livewire.job.show')
        ->extends('layouts.master');
    }
}
