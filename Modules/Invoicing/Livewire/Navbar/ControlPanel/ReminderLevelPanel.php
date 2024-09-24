<?php

namespace Modules\Invoicing\Livewire\Navbar\ControlPanel;

use Modules\App\Livewire\Components\Navbar\ControlPanel;
use Modules\App\Livewire\Components\Navbar\SwitchButton;

class ReminderLevelPanel extends ControlPanel
{

    public function mount()
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->currentPage = __('translator::invoicing.control.reminder-level.current_page_list');
        $this->new = route('invoices.reminder-levels.create', parameters: ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }


    public function switchButtons() : array
    {
        return  [
            // make($key, $label)
            SwitchButton::make('lists',"changeView('lists')", "bi-list-task"),
            SwitchButton::make('kanban',"changeView('lists')", "bi-kanban"),
            // SwitchButton::make('delivery_lead_time',"Delais de livraison", ''),
        ];
    }
}
