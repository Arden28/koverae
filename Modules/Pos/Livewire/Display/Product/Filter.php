<?php

namespace Modules\Pos\Livewire\Display\Product;

use Livewire\Component;

class Filter extends Component
{
    public $categories;
    public $category;
    public $showCount;

    public function mount($categories) {

        //Ne récupère que les catégories enregistrées par la companie. A modifier
        $this->categories = $categories->where('company_id', current_company()->id);
    }

    public function render()
    {
        return view('pos::livewire.display.product.filter');
    }

    public function changeCategory($id) {
        $this->dispatch('selectedCategory', category: $id);
    }

    public function updatedShowCount() {
        $this->dispatch('showCount', $this->category);
    }
}
