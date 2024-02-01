<?php

namespace Modules\Sales\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\Button\ActionButton;
use App\Livewire\Navbar\ControlPanel;

class SaleFormPanel extends ControlPanel
{
    public $sale;

    public function mount($sale = null, $event)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;
        $this->event = $event;

        if($sale){
            $this->sale = $sale;

            $this->currentPage = $sale->reference;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('sales.quotations.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('print', '<i class="bi bi-printer"></i> Imprimer', 'printSL()'),
            ActionButton::make('duplicate', 'Dupliquer', 'duplicateSL()'),
            ActionButton::make('delete', '<i class="bi bi-trash"></i> Supprimer', 'deleteSL()'),
            // Add more buttons as needed
        ];
    }

    public function printSL(){
        return $this->dispatch('print-sale');
    }

    public function duplicateSL(){
        $this->dispatch('duplicate-sale');
    }

    public function deleteSL(){
        $this->dispatch('delete-sale', $this->sale->id);
    }
}
