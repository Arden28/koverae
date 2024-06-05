<?php

namespace Modules\Sales\Livewire\Cart;

use Livewire\Component;
use Livewire\Attributes\On;
use Modules\Inventory\Entities\Product;

class SaleCart extends Component
{
    public $sale;
    public $inputs = [];
    public $totalHT = 0, $total = 0, $taxes = 0;
    public $i = 0;
    public $cart_instance;
    public $term;
    public bool $blocked = false;


    public function mount($cartInstance, $sale = null){
        $this->cart_instance = $cartInstance;
        if($sale){
            $this->sale = $sale;

            if(count($sale->saleDetails) >= 1){
                foreach($sale->saleDetails as $detail){
                    $this->inputs[] = ['key' => $detail->id, 'product' => $detail->product_id, 'description' => $detail->description, 'quantity' => $detail->quantity, 'price' => $detail->price / 100, 'subtotal' => $detail->sub_total / 100];
                }
                $this->dispatch('sale-cart', inputs: $this->inputs, total: $sale->total_amount / 100,  totalHT: $sale->total_amount / 100);
            }
            $this->total = $sale->total_amount;
            $this->totalHT = $sale->saleDetails->sum('sub_total');
            $this->blocked = true;
        }
    }

    protected $rules = [
        // 'inputs.*.product' => 'required|exists:products,id',
        'inputs.*.quantity' => 'required|numeric|min:1',
        // 'inputs.*.price' => 'required|numeric|min:0',
    ];

    // Method to add a new product line
    public function add()
    {
        $this->inputs[] = ['key' => $this->i++, 'product' => '', 'description' => '', 'quantity' => 1, 'price' => 0, 'subtotal' => 0];
        $this->dispatch('sale-cart', inputs: $this->inputs, total: 0, totalHT: $this->totalHT);
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

    public function updateSubtotal($index)
    {
        // $this->validate();

        $quantity = $this->inputs[$index]['quantity'];
        $price = $this->inputs[$index]['price'];
        $subtotal = $quantity * $price;
        $this->inputs[$index]['subtotal'] = $subtotal;

        logger()->info('Updated Subtotal', $this->inputs[$index]);
        $this->updateTotals();

    }

    public function updateProduct($index, $productId){

        $product = Product::find($productId);
        if ($product) {
            // Check if this product ID is already in the inputs, and update if so
            foreach ($this->inputs as $key => $input) {
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

    private function updateTotals()
    {
        $this->totalHT = array_sum(array_column($this->inputs, 'subtotal'));
        $this->total = $this->totalHT + $this->taxes;
        $this->dispatch('sale-cart', inputs: $this->inputs, total: $this->total, totalHT: $this->totalHT);

    }

    #[On('unlock-sale')]
    public function unlock(){
        $this->blocked = false;
    }

    #[On('lock-sale')]
    public function lock(){
        $this->blocked = true;
    }

    public function render()
    {
        $products = Product::isCompany(current_company()->id)->get();
        return view('sales::livewire.cart.sale-cart', compact('products'));
    }
}