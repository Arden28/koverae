<?php

namespace Modules\Inventory\Livewire\Cart;

use Livewire\Component;

class ProductAttributeCart extends Component
{
    public $product;
    public $inputs = [];
    public $name, $price;

    public $i = 1;
    public $cart_instance;

    public function mount($cartInstance, $product = null){
        $this->cart_instance = $cartInstance;
        if($product){
            $this->product = $product;
        }
    }

    // Add a new product in cart
    public function add($i)
    {
        $this->inputs[] = ['key' => $i, 'name' => '', 'price' => 0];
        $this->dispatch('attribute-cart', inputs: $this->inputs);
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->dispatch('attribute-cart', inputs: $this->inputs);
    }

    public function render()
    {
        return view('inventory::livewire.cart.product-attribute-cart');
    }
}
