<?php

namespace Modules\Inventory\Livewire\Navbar\ControlPanel;

use App\Livewire\Navbar\Button\ActionButton;
use App\Livewire\Navbar\ControlPanel;

class ProductCategoryFormPanel extends ControlPanel
{
    public $category;

    public function mount($category = null)
    {
        $this->generateBreadcrumbs();
        $this->showBreadcrumbs = true;
        $this->showIndicators = true;

        if($category){
            $this->category = $category;
            $this->currentPage = $category->category_name;
        }else{
            $this->currentPage = __('translator::inventory.control.product-category.current_page_new');
        }
        $this->new = route('inventory.products.categories.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
        // $this->currentPage = Arr::last($this->breadcrumbs)['label'] ?? '';
    }

    public function actionButtons() : array
    {
        return [
            ActionButton::make('duplicate', __('translator::inventory.control.product-category.actions.duplicate'), 'duplicateQT()'),
            ActionButton::make('delete', '<i class="bi bi-trash"></i> '.__('translator::inventory.control.product-category.actions.delete'), 'deleteQT()'),
            // Add more buttons as needed
        ];
    }
}
