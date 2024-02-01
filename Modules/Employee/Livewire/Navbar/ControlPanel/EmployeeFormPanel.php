<?php

namespace Modules\Employee\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class EmployeeFormPanel extends ControlPanel
{
    public $employee;

    public function mount($employee = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($employee){
            $this->employee = $employee;
            $this->currentPage = $employee->user->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('employee.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
