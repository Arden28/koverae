<?php

namespace Modules\Employee\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class JobFormPanel extends ControlPanel
{
    public $job;

    public function mount($job = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($job){
            $this->job = $job;
            $this->currentPage = $job->title;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('employee.jobs.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
