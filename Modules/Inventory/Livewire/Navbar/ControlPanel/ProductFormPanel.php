<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;
use App\Livewire\Navbar\SwitchButton;

class ProductFormPanel extends ControlPanel
{
    public $product;

    public function mount($product = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($product){
            $this->product = $product;
            $this->currentPage = $product->product_name;
        }else{
            $this->currentPage = 'Nouveau Produit';
        }
        $this->new = route('inventory.products.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

}
