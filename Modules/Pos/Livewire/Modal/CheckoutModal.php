<?php

namespace Modules\Pos\Livewire\Modal;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use Modules\Accounting\Entities\Journal;
use Modules\Inventory\Entities\Product;
use Modules\Pos\Entities\Order\PosOrder;
use Modules\Pos\Entities\Order\PosOrderDetail;
use Modules\Pos\Entities\Order\PosOrderPayment;
use Modules\Pos\Entities\Pos\Pos;
use Illuminate\Support\Facades\Log;

class CheckoutModal extends ModalComponent
{
    public Pos $pos;
    public $total;
    public $payment_method = 'cash', $total_amount, $received_amount, $paid_amount, $change_amount = 0;
    public $customer, $customer_note;

    public function mount($pos, $total, $customer){
        $this->pos = $pos;
        $this->total = $total;
        $this->customer = $customer;
        $this->total_amount = format_currency($total);
        $this->received_amount = $total;
    }

    protected $rules = [
        // 'total' => 'required',
        'received_amount' => 'required',
    ];

    public function render()
    {
        return view('pos::livewire.modal.checkout-modal');
    }

    public function updatedReceivedAmount(){
        $this->change_amount = abs($this->received_amount - $this->total);
    }

    // Create a POS sale
    public function createPos(){
        $this->validate();
        try{

            // $this->tax_amount = convertToInt($cart->tax());
            if($this->received_amount >= $this->total){
                $this->paid_amount = $this->total;
            }elseif($this->received_amount < $this->total){
                $this->paid_amount = $this->received_amount;
            }

            $due_amount = $this->total - $this->paid_amount;

            if (isset($this->payment_method)) {
                // Access the payment_method key
                $paymentMethod = $this->payment_method;
            } else {
                // Set a default value for payment_method
                $paymentMethod = 'cash';
            }
            if ($due_amount == $this->total) {
                $payment_status = 'unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'partial';
            } else {
                $payment_status = 'paid';
            }

            if($this->received_amount)

            $order = PosOrder::create([
                'company_id' => current_company()->id,
                'pos_id' => $this->pos->id,
                'pos_session_id' => $this->pos->active_session_id,
                'cashier_id' => Auth::user()->id,
                'date'  => now(),
                'customer_id' =>  $this->customer['id'],
                'payment_status' => $payment_status,
                'payment_method' => $this->payment_method,
                'total_amount' => $this->total * 100,
                'paid_amount' => $this->received_amount * 100,
                'due_amount' => $due_amount * 100,
            ]);
            $order->save();

            foreach(Cart::instance('pos-order')->content() as $cart_item){
                PosOrderDetail::create([
                    'pos_order_id' => $order->id,
                    'product_id' => $cart_item->id,
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->subtotal * 100,
                    // 'sub_total' => ($cart_item->price * $cart_item->qty) * 100,
                    'product_discount_amount' => $cart_item->options->product_discount * 100,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                    'product_tax_amount' => $cart_item->options->product_tax * 100,
                    // 'customer_note' => $this->customer_note
                ]);

                $product = Product::findOrFail($cart_item->id);
                $product->update([
                    'product_quantity' => $product->product_quantity - $cart_item->qty
                ]);
            }

            Cart::instance('pos-order')->destroy();

            if($order->paid_amount > 0){
                PosOrderPayment::create([
                    'pos_session_id' => $this->pos->activeSession->id,
                    'pos_order_id' => $order->id,
                    'date' => now(),
                    'payment_method_id' => Journal::isCompany(current_company()->id)->first()->id ?? null,
                    'amount' => $order->paid_amount,
                    'due_amount' => $order->due_amount,

                ]);
            }

            return redirect()->route('pos.ui.payment', ['subdomain' => current_company()->domain_name, 'pos' => $this->pos->id, 'session' => $this->pos->sessions()->isOpened()->first()->unique_token, 'order' => $order->unique_token]);

        }catch (\Exception $e) {
            Log::error('Error generating pos sale: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate sale'], 500);
        }
    }
}
