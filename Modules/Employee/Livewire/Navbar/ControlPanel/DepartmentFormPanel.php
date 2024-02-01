<?php

namespace Modules\Employee\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class DepartmentFormPanel extends ControlPanel
{
    public $department;

    public function mount($department = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($department){
            $this->department = $department;
            $this->currentPage = $department->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('employee.department.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
