<?php

namespace Modules\Employee\Livewire\Job;

use Livewire\Component;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\JobType;

class Show extends Component
{
    public $job;

    public $title, $description, $newers, $job_type, $job_types, $department, $departments;

    public function mount(){
        $this->title = $this->job->title;
        $this->description = $this->job->description;
        $this->job_type = $this->job->job_type_id;
        $this->department = $this->job->department_id;
        $this->newers = $this->job->newers;
        //
        $this->job_types = JobType::isCompany(current_company()->id)->get();
        $this->departments = Department::isCompany(current_company()->id)->get();
    }


    // Real-time validation rules
    protected $rules = [
        'title' => 'required|string|max:60',
        'description' => 'nullable|string|max:500',
        'newers' => 'nullable|integer',
        'department' => 'nullable|gt:0',
        'job_type' => 'nullable|gt:0',
    ];

    public function render()
    {
        return view('employee::livewire.job.show')
        ->layout('layouts.master');
    }

    // Start a new record
    public function new(){
        return redirect()->route('employee.jobs.create', ['subdomain' => current_company()->domain_name]);
    }

    public function update($job){
        $this->validate();
        $job = job::find($job);

        $job->update([
            'title' => $this->title,
            'description' => $this->description,
            'newers' => $this->newers,
            'department_id' => $this->department,
            'job_type_id' => $this->job_type,
        ]);

        notify()->success('message', 'Job mis à jour.');

    }
}
