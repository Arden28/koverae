<?php

namespace Modules\Inventory\Livewire\Cart;

use Livewire\Component;
use Modules\Inventory\Entities\Product\ProductPackaging;

class ProductPackagingCart extends Component
{
    public $product;
    public $inputs = [];

    public $i = 1;
    public $cart_instance;

    public function mount($cartInstance, $product = null){
        $this->cart_instance = $cartInstance;
        if($product){
            $this->product = $product;
            if($product->packagings()->count() >= 1){
                $packagings = ProductPackaging::isProduct($product->id)->get();
                foreach($packagings as $packaging){
                    $this->inputs[] = ['key' => $packaging->id, 'name' => $packaging->name, 'quantity' => $packaging->contained_quantity, 'barcode' => $packaging->barcode, 'saleable' => $packaging->is_saleable, 'buyable' => $packaging->is_buyable];
                }
                $this->dispatch('product-packaging-cart', inputs: $this->inputs);
            }
        }
    }

    // Add a new product in cart
    public function add($i)
    {
        $this->inputs[] = ['key' => $i, 'name' => '', 'quantity' => 1, 'barcode' => '', 'saleable' => 1, 'buyable' => 1];
        $this->dispatch('product-packaging-cart', inputs: $this->inputs);
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->dispatch('product-packaging-cart', inputs: $this->inputs);
    }

    public function render()
    {
        return view('inventory::livewire.cart.product-packaging-cart');
    }

    public function updated(){
        $this->dispatch('product-packaging-cart', inputs: $this->inputs);
    }
}
