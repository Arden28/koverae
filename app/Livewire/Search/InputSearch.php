<?php

namespace App\Livewire\Search;

use Livewire\Component;
use Modules\Inventory\Entities\Product;
use Illuminate\Support\Collection;

class InputSearch extends Component
{
    public $searchTerm = '';
    public $products = [];
    public $lineIdentifier;
    public $how_many;
    public $value;


    public function mount($lineIdentifier)
    {
        $this->lineIdentifier = $lineIdentifier;
        $this->how_many = 5;
        $this->products = Collection::empty();
    }

    public function updatedSearchTerm()
    {
        $this->products = Product::where('company_id', current_company()->id)->where('product_name', 'like', '%' . $this->query . '%')
        ->orWhere('product_code', 'like', '%' . $this->query . '%')->where('company_id', current_company()->id)
        ->take($this->how_many)->get();
    }

    public function selectProduct($productId)
    {
        $this->emitUp('productSelected', product: $productId, identifier: $this->lineIdentifier);
        $this->searchTerm = '';
        $this->products = [];
    }

    public function render()
    {
        return view('livewire.search.input-search');
    }
}
