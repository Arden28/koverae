<?php

namespace Modules\Sales\Livewire\Cart;

use Livewire\Component;
use Livewire\Attributes\On;
use Modules\Inventory\Entities\Product;

class QuotationCart extends Component
{
    public $quotation;
    public $inputs = [];
    public $totalHT = 0, $total = 0, $taxes = 0;
    public $i = 1;
    public $cart_instance;
    public $term= 'Veuillez vérifier votre commande avant confirmation.';
    public bool $blocked = false;


    // Method to add a new product line
    public function add()
    {
        $this->inputs[] = ['key' => $this->i++, 'product' => '', 'description' => '', 'quantity' => 1, 'price' => 0, 'subtotal' => 0];
        $this->dispatch('quotation-cart', inputs: $this->inputs);
    }

    // Method to remove a product line
    public function remove($index)
    {
        if (array_key_exists($index, $this->inputs)) {
            unset($this->inputs[$index]);
            $this->inputs = array_values($this->inputs); // Reindex the array
            $this->updateTotals();
        } else {
            logger()->error('Remove Error: Invalid Index', ['index' => $index]);
        }
    }

    // Method to update subtotal whenever quantity or price changes
    public function updatedInputs($value, $name){

        $fields = explode('.', $name);
        $index = $fields[1];  // Correctly capturing the index from wire:model like "inputs.0.price"
        if (end($fields) === 'quantity' || end($fields) === 'price') {
            $this->updateSubtotal($index);
        } elseif (end($fields) === 'product') {
            logger("Product : $value");
            $this->updateProduct($index, $value);
        }
    }
    private function updateSubtotal($index)
    {
        $quantity = $this->inputs[$index]['quantity'];
        $price = $this->inputs[$index]['price'];
        $subtotal = $quantity * $price;
        $this->inputs[$index]['subtotal'] = $subtotal;

        logger()->info('Updated Subtotal', $this->inputs[$index]);
        $this->updateTotals();
        // $this->inputs = array_values($this->inputs); // Reindex the array
    }


    // private function updateTotals()
    // {
    //     $this->totalHT = array_sum(array_column($this->inputs, 'subtotal'));
    //     $this->total = $this->totalHT + $this->taxes;
    // }
    // public function addProduct($value, $index)
    // {
    //     $product = Product::find($value)->first();
    //     $this->inputs[] = [
    //         'key' => $index + 1,
    //         'product' => $product->id,
    //         'description' => $product->product_description,
    //         'quantity' => 1,
    //         'price' => $product->product_price / 100,
    //         'subtotal' => ($product->product_price / 100)
    //     ];
    //     unset($this->inputs[$index]);
    //     $this->updateTotals();
    // }

    public function updateProduct($index, $productId){

        $product = Product::find($productId);
        if ($product) {
            // Check if this product ID is already in the inputs, and update if so
            foreach ($this->inputs as $key => &$input) {
                if ($input['product'] === $productId && $key != $index) {
                    $input['quantity'] += 1;  // Optionally adjust this logic
                    unset($this->inputs[$index]); // Remove the current entry
                    $this->inputs = array_values($this->inputs); // Reindex array
                    $this->updateSubtotal($key); // Update the subtotal of existing item
                    return;
                }
            }

            // If not found, update or set the new product info in the current index
            $this->inputs[$index] = [
                'product' => $product->id,
                'description' => $product->product_description,
                'quantity' => $this->inputs[$index]['quantity'],  // Keep existing quantity
                'price' => $product->product_price / 100,
                'subtotal' => $this->inputs[$index]['quantity'] * ($product->product_price / 100)
            ];
            $this->updateSubtotal($index); // Update the subtotal
        }
    }

    // private function updateSubtotal($index){

    //     if (isset($this->inputs[$index])) {
    //         $this->inputs[$index]['subtotal'] = $this->inputs[$index]['quantity'] * $this->inputs[$index]['price'];
    //         $this->updateTotals();

    //         logger()->info('Updated Subtotal', $this->inputs[$index]);
    //     }
    // }

    private function updateTotals()
    {
        $this->totalHT = array_sum(array_column($this->inputs, 'subtotal'));
        $this->total = $this->totalHT + $this->taxes;
    }

    // public function updated($name, $value){
    //     $nameParts = explode('.', $name);
    //     if(count($nameParts) === 3 && ($nameParts[2] === 'quantity' || $nameParts[2] === 'price')){
    //         $this->updateSubtotal($nameParts[1]);

    //     }elseif(count($nameParts) === 3 && ($nameParts[2] === 'product')){
    //         $this->updateProduct($nameParts[1], $value);
    //     }
    // }

    // private function updateProduct($index, $value){
    //     $product = Product::find($value)->first();
    //     $this->addProduct($product->id, $product);

    //     // logger("Updated $product->product_name to ".$this->inputs[$index]['price']." price");
    // }

    // private function updateSubtotal($index){
    //     $quantity = $this->inputs[$index]['quantity'];
    //     $price = $this->inputs[$index]['price'];
    //     $subtotal = $quantity * $price;
    //     $this->inputs[$index]['subtotal'] = $subtotal;

    //     $this->inputs = array_values($this->inputs); // Reindex the array
    //     $this->totalHT = array_sum(array_column($this->inputs, 'subtotal')); //Update the total HT
    //     $this->total = array_sum(array_column($this->inputs, 'subtotal')) + $this->taxes; //Update the total HT

    //     // logger("Updated $index to $quantity and $price => ".$this->inputs[$index]['subtotal']);
    // }

    #[On('unlock-manufacturing')]
    public function unlock(){
        $this->blocked = false;
    }

    #[On('lock-manufacturing')]
    public function lock(){
        $this->blocked = true;
    }

    public function render()
    {
        $products = Product::isCompany(current_company()->id)->get();
        return view('sales::livewire.cart.quotation-cart', compact('products'));
    }
}
