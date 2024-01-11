<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class ProductCategoryFormPanel extends ControlPanel
{
    public $category;

    public function mount($category = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators === true;

        if($category){
            $this->category = $category;
            $this->currentPage = $category->category_name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.products.categories.create', ['subdomain' => current_company()->domain_name]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }
}
