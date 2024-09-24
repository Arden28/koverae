<?php

namespace Modules\Invoicing\Livewire\Navbar\ControlPanel;

use Modules\App\Livewire\Components\Navbar\ControlPanel;
use Modules\App\Livewire\Components\Navbar\Button\ActionButton;

class ReminderLevelFormPanel extends ControlPanel
{
    public $level;

    public function mount($level = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($level){
            $this->level = $level;
            $this->currentPage = $level->description;
        }else{
            $this->currentPage = __('translator::invoicing.control.reminder-level.current_page_new');
        }
        $this->new = route('invoices.reminder-levels.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('archive', '<i class="bi bi-inboxes"></i> '.__('translator::invoicing.control.payment-term.actions.archive'), 'printQT()'),
            ActionButton::make('duplicate', __('translator::invoicing.control.payment-term.actions.duplicate'), 'duplicateQT()'),
            // Add more buttons as needed
        ];
    }
}
