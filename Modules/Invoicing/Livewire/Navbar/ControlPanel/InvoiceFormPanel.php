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
            ActionButton::make('print', '<i class="bi bi-printer"></i> Imprimer', 'printINV()'),
            ActionButton::make('change', 'Changer de client', ''),
            ActionButton::make('paiement-link', '<i class="bi bi-link"></i> Générer un lien de paiement', ''),
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
