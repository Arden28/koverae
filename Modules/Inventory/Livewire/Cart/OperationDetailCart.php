<?php

namespace Modules\Inventory\Livewire\Cart;

use Carbon\Carbon;
use Livewire\Component;
use Modules\Inventory\Entities\Product;

class OperationDetailCart extends Component
{
    public $transfer;
    public $inputs = [];

    public $i = 1;
    public $cart_instance;
    public $test= 'hello';
    public $blocked = false;

    public function mount($cartInstance, $transfer = null){
        $this->cart_instance = $cartInstance;
        if($transfer){
            $this->transfer = $transfer;
            if(count($transfer->details) >= 1){
                foreach($transfer->details as $detail){
                    $this->inputs[] = ['key' => $detail->operation_transfer_id, 'product' => $detail->product_id, 'description' => $detail->description, 'schedule_date' => Carbon::parse($detail->schedule_date)->format('Y-m-d H:i:s'), 'deadline_date' => Carbon::parse($detail->deadline_date)->format('Y-m-d H:i:s'), 'demand' => $detail->demand, 'quantity' => $detail->quantity, 'picked' => $detail->picked];
                }
                $this->dispatch('operation-cart', inputs: $this->inputs);
            }
            $this->blocked = true;
        }
    }

    // Add a new product in cart
    public function add($i)
    {
        // $i++;
        // array_push($this->inputs, $this->i);
        $this->inputs[] = ['key' => $i, 'product' => '', 'description' => '', 'schedule_date' => now()->format('Y-m-d H:i:s'), 'deadline_date' => now()->format('Y-m-d H:i:s'), 'demand' => 1.00, 'quantity' => 1.00, 'picked' => 1.00];
        $this->dispatch('transfer-cart', inputs: $this->inputs);
    }

    // Remove a product in cart
    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs); // Reindex the array
        $this->dispatch('transfer-cart', inputs: $this->inputs);
    }
    public function render()
    {
        $products = Product::isCompany(current_company()->id)->get();
        return view('inventory::livewire.cart.operation-detail-cart', compact('products'));
    }

    public function updated(){
        $this->dispatch('transfer-cart', inputs: $this->inputs);
    }
}