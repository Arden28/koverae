<?php

namespace Modules\Employee\Livewire\Job;

use Livewire\Component;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\JobType;

class Create extends Component
{
    public $title, $description, $newers, $job_type, $job_types, $department, $departments;

    public function mount(){
        //
        $this->job_types = JobType::isCompany(current_company()->id)->get();
        $this->departments = Department::isCompany(current_company()->id)->get();
    }

    protected $rules = [
        'title' => 'required|string|max:60',
        'description' => 'nullable|string|max:500',
        'newers' => 'nullable|integer',
        'department' => 'nullable|gt:0',
        'job_type' => 'nullable|gt:0',
    ];

    // Start a new record
    public function new(){
        return redirect()->route('employee.jobs.create', ['subdomain' => current_company()->domain_name]);
    }
        public function render()
    {
        return view('employee::livewire.job.create')
        ->layout('layouts.master');
    }

    public function storeJob(){
        $this->validate();

        $job = Job::create([
            'title' => $this->title,
            'description' => $this->description,
            'newers' => $this->newers,
            'department_id' => $this->department,
            'job_type_id' => $this->job_type,
            'company_id' => current_company()->id
        ]);
        notify()->success('message', __("L'emploi a bien été ajouté !"));
    }
}
