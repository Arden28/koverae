<?php

namespace Modules\Employee\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class WorkplaceFormPanel extends ControlPanel
{
    public $workplace;

    public function mount($workplace = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($workplace){
            $this->workplace = $workplace;
            $this->currentPage = $workplace->title;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('employee.workplaces.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
