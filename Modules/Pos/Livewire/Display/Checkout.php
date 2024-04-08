<?php

namespace Modules\Pos\Livewire\Display;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Modules\Contact\Entities\Contact;
use Modules\Pos\Entities\Pos\Pos;

class Checkout extends Component
{
    public Pos $pos;
    public $cart_instance;
    public $customers;
    public $global_discount;
    public $global_tax;
    public $shipping = 0;
    public $quantity = 0;
    public $check_quantity;
    public $discount_type;
    public $item_discount;
    public $data;
    public $customer;
    public $total_amount;
    // Selected
    public $selected;
    public $row_id;
    public $qty;


    public function mount($pos, $cartInstance, $customers) {
        $this->pos = $pos;
        $this->cart_instance = $cartInstance;
        $this->customers = $customers;
        $this->global_discount = 0;
        $this->global_tax = 0;
        $this->shipping = 0;
        $this->check_quantity = [];
        $this->quantity = [];
        $this->qty = 0;
        $this->discount_type = [];
        $this->item_discount = [];
        $this->total_amount = 0;
        if(Cart::instance($cartInstance)->content()->count() >= 1){
            $this->selected = Cart::instance($cartInstance)->content()->last()->id;
            $this->row_id = Cart::instance($cartInstance)->content()->last()->rowId;
        }

        // Send event to other components
        $this->dispatch('change-total-amount', amount: (convertToInt(Cart::instance($this->cart_instance)->total()) / 10000) + $this->shipping);
        $this->dispatch('change-total-items', items: Cart::instance($this->cart_instance)->count());
    }

    public function hydrate() {
        $this->total_amount = $this->calculateTotal();
        // $this->updatedCustomerId();
    }

    public function calculateTotal() {
        return convertToInt(Cart::instance($this->cart_instance)->total()) / 10000;
        // return Cart::instance($this->cart_instance)->total() + $this->shipping;
    }


    public function render()
    {
        $cart_items = Cart::instance($this->cart_instance)->content();
        return view('pos::livewire.display.checkout', [
            'cart_items' => $cart_items
        ]);
    }

    #[On('pay-click')]
    public function payClick(){
        // Verify if a customer is selected
        if ($this->customer != null) {
            $this->dispatch('showCheckoutModal');
        } else {
            session()->flash('message', 'Please Select Customer!');
        }
    }

    public function proceed() {

        // Verify if a customer is selected
        if ($this->customer != null) {
            $this->dispatch('showCheckoutModal');
        } else {
            session()->flash('message', 'Please Select Customer!');
        }

    }

    #[On('productSelected')]
    public function productSelected($product) {
        $cart = Cart::instance($this->cart_instance);

        $exists = $cart->search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id == $product['id'];
        });

        $cart->add([
            'id'      => $product['id'],
            'name'    => $product['product_name'],
            'qty'     => 1,
            'price'   => $this->calculate($product)['price'] / 100,
            'weight'  => 1,
            'options' => [
                'product_discount'      => 0.00,
                'product_discount_type' => 'fixed',
                'sub_total'             => $this->calculate($product)['sub_total'] / 100,
                'code'                  => $product['product_code'],
                'stock'                 => $product['product_quantity'],
                'unit'                  => $product['product_unit'],
                'product_tax'           => $this->calculate($product)['product_tax'],
                'unit_price'            => $this->calculate($product)['unit_price'] / 100
            ]
        ]);

        $this->check_quantity[$product['id']] = $product['product_quantity'];
        $this->quantity[$product['id']] = 1;
        $this->discount_type[$product['id']] = 'fixed';
        $this->item_discount[$product['id']] = 0;
        $this->total_amount = $this->calculateTotal();
        $this->selected = $product['id'];
        $this->row_id = $cart->rowId;
        // Send event to other components
        $this->dispatch('change-total-amount', amount: $this->total_amount);
        $this->dispatch('change-total-items', items: $cart->count());
    }

    public function removeItem($row_id) {
        Cart::instance($this->cart_instance)->remove($row_id);

        // Send event to other components
        $this->dispatch('change-total-amount', amount: (convertToInt(Cart::instance($this->cart_instance)->total()) / 10000) + $this->shipping);
        $this->dispatch('change-total-items', items: Cart::instance($this->cart_instance)->count());
    }

    public function resetCart() {
        Cart::instance($this->cart_instance)->destroy();

        // Send event to other components
        $this->dispatch('change-total-amount', amount: 0);
        $this->dispatch('change-total-items', items: Cart::instance($this->cart_instance)->count());
    }

    public function updatedGlobalTax() {
        Cart::instance($this->cart_instance)->setGlobalTax((integer)$this->global_tax);
    }

    public function updatedGlobalDiscount() {
        Cart::instance($this->cart_instance)->setGlobalDiscount((integer)$this->global_discount);
    }

    public function updateQuantity($row_id, $product_id) {

        if ($this->check_quantity[$product_id] < $this->quantity[$product_id]) {
            // session()->flash('message', 'The requested quantity is not available in stock.');
            notify()->error("La quantité demandée n'est pas disponible en stock.");
            return;
        }

        Cart::instance($this->cart_instance)->update($row_id, $this->quantity[$product_id]);

        $cart_item = Cart::instance($this->cart_instance)->get($row_id);

        Cart::instance($this->cart_instance)->update($row_id, [
            'options' => [
                'sub_total'             => $cart_item->price * $cart_item->qty,
                'untaxed_amount'        => $cart_item->options->untaxed_amount * $cart_item->qty,
                'description'           => $cart_item->options->product_description,
                'code'                  => $cart_item->options->code,
                'stock'                 => $cart_item->options->stock,
                'unit'                  => $cart_item->options->unit,
                'product_tax'           => $cart_item->options->product_tax,
                'unit_price'            => $cart_item->options->unit_price,
                'product_discount'      => $cart_item->options->product_discount,
                'product_discount_type' => $cart_item->options->product_discount_type,
            ]
        ]);
    }

    public function updatedDiscountType($value, $name) {
        $this->item_discount[$name] = 0;
    }

    #[On('discountModalRefresh')]
    public function discountModalRefresh($product_id, $row_id) {
        $this->updateQuantity($row_id, $product_id);
    }

    public function setProductDiscount($row_id, $product_id) {
        $cart_item = Cart::instance($this->cart_instance)->get($row_id);

        if ($this->discount_type[$product_id] == 'fixed') {
            Cart::instance($this->cart_instance)
                ->update($row_id, [
                    'price' => ($cart_item->price + $cart_item->options->product_discount) - $this->item_discount[$product_id]
                ]);

            $discount_amount = $this->item_discount[$product_id];

            $this->updateCartOptions($row_id, $product_id, $cart_item, $discount_amount);
        } elseif ($this->discount_type[$product_id] == 'percentage') {
            $discount_amount = ($cart_item->price + $cart_item->options->product_discount) * ($this->item_discount[$product_id] / 100);

            Cart::instance($this->cart_instance)
                ->update($row_id, [
                    'price' => ($cart_item->price + $cart_item->options->product_discount) - $discount_amount
                ]);

            $this->updateCartOptions($row_id, $product_id, $cart_item, $discount_amount);
        }

        session()->flash('discount_message' . $product_id, 'Discount added to the product!');
    }

    public function calculate($product) {
        $price = 0;
        $unit_price = 0;
        $product_tax = 0;
        $sub_total = 0;

        if ($product['product_tax_type'] == 1) {
            $price = $product['product_price'] + ($product['product_price'] * ($product['product_order_tax'] / 100));
            $unit_price = $product['product_price'];
            $product_tax = $product['product_price'] * ($product['product_order_tax'] / 100);
            $sub_total = $product['product_price'] + ($product['product_price'] * ($product['product_order_tax'] / 100));
        } elseif ($product['product_tax_type'] == 2) {
            $price = $product['product_price'];
            $unit_price = $product['product_price'] - ($product['product_price'] * ($product['product_order_tax'] / 100));
            $product_tax = $product['product_price'] * ($product['product_order_tax'] / 100);
            $sub_total = $product['product_price'];
        } else {
            $price = $product['product_price'];
            $unit_price = $product['product_price'];
            $product_tax = 0.00;
            $sub_total = $product['product_price'];
        }

        return ['price' => $price, 'unit_price' => $unit_price, 'product_tax' => $product_tax, 'sub_total' => $sub_total];
    }

    public function updateCartOptions($row_id, $product_id, $cart_item, $discount_amount) {
        Cart::instance($this->cart_instance)->update($row_id, ['options' => [
            'description'           => $cart_item->options->product_description,
            'sub_total'             => $cart_item->price * $cart_item->qty,
            'code'                  => $cart_item->options->code,
            'stock'                 => $cart_item->options->stock,
            'unit'                  => $cart_item->options->unit,
            'product_tax'           => $cart_item->options->product_tax,
            'unit_price'            => $cart_item->options->unit_price,
            'product_discount'      => $discount_amount,
            'product_discount_type' => $this->discount_type[$product_id],
            'term'            => $cart_item->options->term,
        ]]);
    }

    public function selectedItem($row_id, $cart){
        $this->row_id = $row_id;
        $this->selected = $cart;
    }

    public function updateQty($value)
    {
        if($this->row_id){

            $row_id = $this->row_id;
            $product_id = $this->selected;

            if ($this->quantity[$product_id] == 0) {
                $this->quantity[$product_id] = $value;
            } else {
                $this->quantity[$product_id] .= $value;
            }

            Cart::instance($this->cart_instance)->update($row_id, $this->quantity[$product_id]);

            $cart_item = Cart::instance($this->cart_instance)->get($row_id);

            Cart::instance($this->cart_instance)->update($row_id, [
                'options' => [
                    'sub_total'             => $cart_item->price * $cart_item->qty,
                    'untaxed_amount'        => $cart_item->options->untaxed_amount * $cart_item->qty,
                    'description'           => $cart_item->options->product_description,
                    'code'                  => $cart_item->options->code,
                    'stock'                 => $cart_item->options->stock,
                    'unit'                  => $cart_item->options->unit,
                    'product_tax'           => $cart_item->options->product_tax,
                    'unit_price'            => $cart_item->options->unit_price,
                    'product_discount'      => $cart_item->options->product_discount,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                ]
            ]);
            $this->row_id = $cart_item->rowId;
        }
    }

    public function backspace()
    {
        if($this->row_id){

            $row_id = $this->row_id;
            $product_id = $this->selected;

            $this->quantity[$product_id] = substr($this->quantity[$product_id], 0, -1);
            if (strlen($this->quantity[$product_id]) == 0) {
                $this->quantity[$product_id] = 0;
                $this->removeItem($row_id);
            }else{

                Cart::instance($this->cart_instance)->update($row_id, $this->quantity[$product_id]);

                $cart_item = Cart::instance($this->cart_instance)->get($row_id);

                Cart::instance($this->cart_instance)->update($row_id, [
                    'options' => [
                        'sub_total'             => $cart_item->price * $cart_item->qty,
                        'untaxed_amount'        => $cart_item->options->untaxed_amount * $cart_item->qty,
                        'description'           => $cart_item->options->product_description,
                        'code'                  => $cart_item->options->code,
                        'stock'                 => $cart_item->options->stock,
                        'unit'                  => $cart_item->options->unit,
                        'product_tax'           => $cart_item->options->product_tax,
                        'unit_price'            => $cart_item->options->unit_price,
                        'product_discount'      => $cart_item->options->product_discount,
                        'product_discount_type' => $cart_item->options->product_discount_type,
                    ]
                ]);
                $this->row_id = $cart_item->rowId;
            }
        }
    }

    #[On('pick-customer')]
    public function pickCustomer(Contact $customer){
        $this->customer = $customer;
    }

}
