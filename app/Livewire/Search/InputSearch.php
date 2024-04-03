<?php

namespace App\Livewire\Search;

use Livewire\Component;
use Modules\Inventory\Entities\Product;
use Illuminate\Support\Collection;

class InputSearch extends Component
{

    public $identifier;
    public $query;
    public $search_results;
    public $how_many;
    public $value;


    public function mount() {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = Collection::empty();
    }

    public function updatedQuery() {
        $this->search_results = Product::where('company_id', current_company()->id)->where('product_name', 'like', '%' . $this->query . '%')
            ->orWhere('product_code', 'like', '%' . $this->query . '%')->where('company_id', current_company()->id)
            ->take($this->how_many)->get();
    }

    public function loadMore() {
        $this->how_many += 5;
        $this->updatedQuery();
    }

    public function resetQuery() {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = Collection::empty();
    }

    public function selectProduct($product) {
        $this->dispatch('productSelected', product: $product, identifier: $this->identifier);
        // return $this->query = 'motherfucker';
    }
    public function render()
    {
        return view('livewire.search.input-search');
    }
}
