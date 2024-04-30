<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\ControlPanel;

class ProductAttributeFormPanel extends  ControlPanel
{
    public $attribute;

    public function mount($attribute = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($attribute){
            $this->attribute = $attribute;
            $this->currentPage = $attribute->name;
        }else{
            $this->currentPage = 'Nouveau';
        }
        $this->new = route('inventory.products.attributes.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }
}
