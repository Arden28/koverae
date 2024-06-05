<?php

namespace Modules\Invoicing\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\Button\ActionButton;
use App\Livewire\Navbar\ControlPanel;

class InvoiceFormPanel extends ControlPanel
{
    public $invoice;

    public function mount($invoice = null, $event = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;
        $this->event = $event;

        if($invoice->status == 'posted'){
            $this->invoice = $invoice;
            $this->currentPage = $invoice->reference;
        }else{
            $this->currentPage = 'Brouillon';
        }
        // $this->new = route('sales.invoices.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('print', '<i class="bi bi-printer"></i> '.__('translator::sales.control.invoice.actions.print'), 'printINV()', true),
            ActionButton::make('delete', '<i class="bi bi-trash"></i> '.__('translator::sales.control.invoice.actions.delete'), '', true),
            ActionButton::make('share', __('translator::sales.control.invoice.actions.generateLink'), ""),
            ActionButton::make('share', __('translator::sales.control.invoice.actions.share'), ""),
            ActionButton::make('transform', __('translator::sales.control.invoice.actions.transform'), "")
            // ActionButton::make('delete', '<i class="bi bi-trash"></i> Supprimer', 'deleteINV()'),
            // Add more buttons as needed
        ];
    }

    public function printINV(){
        return $this->dispatch('print-invoice', $this->invoice->id);
    }

    public function duplicateINV(){
        $this->dispatch('duplicate-invoice');
    }

    public function deleteINV(){
        $this->dispatch('delete-invoice', $this->invoice->id);
    }
}
