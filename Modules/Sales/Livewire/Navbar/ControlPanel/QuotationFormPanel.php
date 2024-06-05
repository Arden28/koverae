<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\Button\ActionButton;
use App\Livewire\Navbar\ControlPanel;

class QuotationFormPanel extends ControlPanel
{
    public $quotation;
    public $status = 'quotation';

    public function mount($quotation = null, $event = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;
        $this->event = $event;

        if($quotation){
            $this->quotation = $quotation;
            $this->currentPage = $quotation->reference;
            $this->status = $quotation->status;
        }else{
            $this->currentPage = __('translator::sales.control.quotation.current_page_new');
        }
        $this->new = route('sales.quotations.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('print', '<i class="bi bi-printer"></i> '.__('translator::sales.control.quotation.actions.print'), 'printQT()'),
            ActionButton::make('duplicate', __('translator::sales.control.quotation.actions.duplicate'), 'duplicateQT()'),
            ActionButton::make('delete', '<i class="bi bi-trash"></i> '.__('translator::sales.control.quotation.actions.delete'), 'deleteQT()', true),
            ActionButton::make('mark_as_sent', __('translator::sales.control.quotation.actions.markAsSent'), "markAsSent()", false, 'sent')->component('button.action.if-status'),
            ActionButton::make('share', __('translator::sales.control.quotation.actions.share'), "")
            // Add more buttons as needed
        ];
    }

    public function printQT(){
        return $this->dispatch('print-quotation');
    }

    public function duplicateQT(){
        $this->dispatch('duplicate-quotation');
    }

    public function deleteQT(){
        $this->dispatch('delete-quotation', $this->quotation->id);
    }

    public function markAsSent(){
        return $this->dispatch('mas-quotation');
    }

}
