<?php

namespace Modules\Inventory\Livewire\Cart;

use Livewire\Component;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Product\ProductSupplier;

class ProductSupplierCart extends Component
{
    public $product;
    public $inputs = [];

    public $i = 1;
    public $cart_instance;

    public function mount($cartInstance, $product = null){
        $this->cart_instance = $cartInstance;
        if($product){
            $this->product = $product;
            if($product->suppliers()->count() >= 1){
                $suppliers = ProductSupplier::isProduct($product->id)->get();
                foreach($suppliers as $supplier){
                    $this->inputs[] = ['key' => $supplier->id, 'supplier' => $supplier->supplier_id, 'quantity' => $supplier->qty, 'price' => $supplier->product_cost / 100, 'delay' => $supplier->delivery_lead_time];
                }
                $this->dispatch('product-supplier-cart', inputs: $this->inputs);
            }
        }
    }

    // Add a new product in cart
    public function add($i)
    {
        $this->inputs[] = ['key' => $i, 'supplier' => '', 'quantity' => 1, 'price' => 0.00, 'delay' => 1];
        $this->dispatch('product-supplier-cart', inputs: $this->inputs);
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->dispatch('product-supplier-cart', inputs: $this->inputs);
    }

    public function render()
    {
        $suppliers = Contact::isCompany(current_company()->id)->get();
        return view('inventory::livewire.cart.product-supplier-cart', compact('suppliers'));
    }

    public function updated(){
        $this->dispatch('product-supplier-cart', inputs: $this->inputs);
    }
}
