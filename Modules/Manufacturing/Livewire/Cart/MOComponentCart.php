<?php

namespace Modules\Manufacturing\Livewire\Cart;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;

class MOComponentCart extends Component
{
    public $inputs = [

    ];

    public $i = 1;
    public $cart_instance;

    public function mount($cartInstance, $data = null){
        $this->cart_instance = $cartInstance;
    }

    // Add a new product in cart
    public function add($i)
    {
        // $i++;
        // array_push($this->inputs, $this->i);
        $location_from = WarehouseLocation::isCompany(current_company()->id)->isType('internal')->first();
        $this->inputs[] = ['key' => $i, 'product' => '', 'location' => location_name($location_from), 'quantity' => 0, 'price' => 0];
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
    }

    // public function updated($field, $index, $value)
    // {
    //     // $this->inputs[$index][$field] = $value;
    // }

    #[On('productSelected')]
    public function productSelected($product, $identifier){
        $this->inputs[$identifier]['product'] = $product['product_name'];
        $this->inputs = array_values($this->inputs); // Reindex the array
    }

    public function render()
    {
        $products = Product::isCompany(current_company()->id)->get();
        return view('manufacturing::livewire.cart.m-o-component-cart', compact('products'));
    }
}
