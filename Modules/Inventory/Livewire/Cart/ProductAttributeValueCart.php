<?php

namespace Modules\Inventory\Livewire\Cart;

use Livewire\Component;
use Modules\Inventory\Entities\Product\Variant\AttributeValue;

class ProductAttributeValueCart extends Component
{
    public $attribute;
    public $inputs = [];
    public $name, $price;

    public $i = 1;
    public $cart_instance;

    public function mount($cartInstance, $attribute = null){
        $this->cart_instance = $cartInstance;
        if($attribute){
            $this->attribute = $attribute;
            if($attribute->values->count() >= 1){
                // $values = AttributeValue::isAttribute($product->id)->get();
                foreach($attribute->values() as $value){
                    $this->inputs[] = ['key' => $value->id, 'name' => $value->name, 'price' => $value->additional_price];
                }
                $this->dispatch('product-attribute-cart', inputs: $this->inputs);
            }
        }
    }

    // Add a new product in cart
    public function add($i)
    {
        $this->inputs[] = ['key' => $i, 'name' => '', 'price' => 0];
        $this->dispatch('product-attribute-cart', inputs: $this->inputs);
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->dispatch('product-attribute-cart', inputs: $this->inputs);
    }

    public function render()
    {
        return view('inventory::livewire.cart.product-attribute-value-cart');
    }
}
