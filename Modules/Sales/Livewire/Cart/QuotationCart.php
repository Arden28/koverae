<?php

namespace Modules\Sales\Livewire\Cart;

use Livewire\Component;
use Livewire\Attributes\On;
use Modules\Inventory\Entities\Product;

class QuotationCart extends Component
{
    public $quotation;
    public $inputs = [];

    public $i = 1;
    public $cart_instance;
    public $term= 'Veuillez vérifier votre commande avant confirmation.';
    public bool $blocked = false;
    // public $quantity, $price, $subtotal;
    public $totalHT = 0, $taxes = 0, $total = 0;

    public function mount($cartInstance, $quotation = null){
        $this->cart_instance = $cartInstance;
        if($quotation){
            $this->quotation = $quotation;

            if(count($quotation->quotationDetails) >= 1){
                foreach($quotation->quotationDetails as $detail){
                    $this->inputs[] = ['key' => $detail->bom_id, 'product' => $detail->product_id, 'description' => $detail->product->product_description, 'quantity' => $detail->quantity, 'price' => $detail->unit_price, 'taxes' => '', 'subtotal' => $detail->sub_total];
                }
                $this->dispatch('quotation-cart', inputs: $this->inputs);
            }

            $this->blocked = true;
        }
    }

    // Add a new product in cart
    public function add($i)
    {
        $this->inputs[] = ['key' => $i, 'product' => '', 'description' => "", 'quantity' => 1, 'price' => 0, 'subtotal' => 0 ];
        $this->dispatch('quotation-cart', inputs: $this->inputs);
    }
    public function addProduct($i, $product)
    {
        // $found = false;
        // foreach ($this->inputs as $index => $input) {
        //     if ($input['product'] == $product->id) {
        //         $this->inputs[$index]['quantity'] += 1;  // Increment the quantity
        //         $this->inputs[$index]['subtotal'] = (200 * $this->inputs[$index]['quantity']);
        //         $found = true;
        //         break;
        //     }
        // }
    
        // if (!$found) {
        //     // $this->remove($i);

        //     // If product does not exist in the inputs array, add it
        //     $this->inputs[] = [
        //         'key' => $i,
        //         'product' => $product->id,
        //         'description' => $product->product_description,
        //         'quantity' => 1,
        //         'price' => $product->product_price / 100,
        //         'subtotal' => $product->product_price / 100
        //     ];
        // }
     
        $this->inputs[] = ['key' => $i, 'product' => $product->id, 'description' => $product->product_description, 'quantity' => 1, 'price' => $product->product_price / 100, 'subtotal' => ($product->product_price * 1) / 100 ];
        $this->dispatch('quotation-cart', inputs: $this->inputs);
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->dispatch('quotation-cart', inputs: $this->inputs);
    }

    public function updated($name, $value){
        $nameParts = explode('.', $name);
        if(count($nameParts) === 3 && ($nameParts[2] === 'quantity' || $nameParts[2] === 'price')){
            $this->updateSubtotal($nameParts[1]);
            
        }elseif(count($nameParts) === 3 && ($nameParts[2] === 'product')){
            $this->updateProduct($nameParts[1], $value);
        }
    }

    private function updateProduct($index, $value){
        $product = Product::find($value)->first();
        $this->addProduct($product->id, $product);
        
        // logger("Updated $product->product_name to ".$this->inputs[$index]['price']." price");
    }

    private function updateSubtotal($index){
        $quantity = $this->inputs[$index]['quantity'];
        $price = $this->inputs[$index]['price'];
        $subtotal = $quantity * $price;
        $this->inputs[$index]['subtotal'] = $subtotal;

        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->totalHT = array_sum(array_column($this->inputs, 'subtotal')); //Update the total HT
        $this->total = array_sum(array_column($this->inputs, 'subtotal')) + $this->taxes; //Update the total HT

        // logger("Updated $index to $quantity and $price => ".$this->inputs[$index]['subtotal']);
    }

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
