<?php

namespace Modules\Pos\Livewire\Display\Product;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Inventory\Entities\Product;

class ProductLists extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $categories;
    public $category_id;
    public $limit = 10;

    public function mount($categories) {
        $this->categories = $categories;
        $this->category_id = '';
    }
    public function render()
    {
        return view('pos::livewire.display.product.product-lists', [
            'products' => Product::when($this->category_id, function ($query) {
                return $query->where('category_id', $this->category_id);
            })
            // Récupère les produits en fonction de la companie connectée
            ->isCompany(current_company()->id)
            ->paginate($this->limit)
        ]);
    }

    #[On('selectedCategory')]
    public function categoryChanged($category) {
        $this->category_id = $category;
        $this->resetPage();
    }

    #[On('showCount')]
    public function showCountChanged($value) {
        $this->limit = $value;
        $this->resetPage();
    }

    public function selectProduct($product) {
        $this->dispatch('productSelected', $product);
    }
}
