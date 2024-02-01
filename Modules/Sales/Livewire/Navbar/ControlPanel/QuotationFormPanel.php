<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\Button\ActionButton;
use App\Livewire\Navbar\ControlPanel;

class QuotationFormPanel extends ControlPanel
{
    public $quotation;

    public function mount($quotation = null, $event = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;
        $this->event = $event;

        if($quotation){
            $this->quotation = $quotation;
            $this->currentPage = $quotation->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('sales.quotations.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('print', '<i class="bi bi-printer"></i> Imprimer', 'printQT()'),
            ActionButton::make('duplicate', 'Dupliquer', 'duplicateQT()'),
            ActionButton::make('delete', '<i class="bi bi-trash"></i> Supprimer', 'deleteQT()'),
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

}
