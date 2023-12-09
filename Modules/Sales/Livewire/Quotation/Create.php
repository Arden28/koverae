<?php

namespace Modules\Sales\Livewire\Quotation;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Modules\Sales\Entities\Quotation\Quotation;
use Modules\Sales\Entities\Quotation\QuotationDetails;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Url;
use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesDetail;
use Modules\Sales\Entities\SalesPayment;
use Modules\Sales\Entities\SalesTeam;
use Modules\Contact\Entities\Contact;

class Create extends Component
{
    public $cartInstance = "quotation";

    public $customer,

    $date,

    $expected_date,

    $payment_term = 'immediate_payment',
    $reference,
    $tax_percentage = 18.9,
    $tax_amount = 0,
    $discount_percentage = 0,
    $discount_amount = 0,
    $shipping_amount = 0,
    $paid_amount = 0,
    $due_amount = 0,
    $total_amount = 0,
    $payment_method = 'Cash',
    $payment_status,
    $status = 'quotation',
    $note,

    $seller,

    $sellers = [],

    $sales_team,

    $sales_teams = [],

    $tags,

    $shipping_policy,

    $shipping_date,

    $shipping_status = 'pending';

    public $updateMode = false;

    public $name;

    public $qty = 1;

    protected $rules = [
        'customer' => 'required',
        'date' => 'required',
        'expected_date' => 'nullable',
        'payment_term' => 'required',
        'tax_percentage' => 'nullable|integer|min:0|max:100',
        'discount_percentage' => 'nullable|integer|min:0|max:100',
        'shipping_amount' => 'nullable|numeric',
        'total_amount' => 'nullable|numeric',
        'status' => 'nullable|string|max:255',
        'note' => 'nullable|string|max:1000',
        'seller' => 'nullable',
        'sales_team' => 'nullable',
        'tags' => 'nullable',
        'shipping_policy' => 'nullable',
        'shipping_date' => 'nullable',
        'shipping_status' => 'nullable|string',
    ];

    public function mount()
    {
        // Set today's date as the default value for expiration_date
        $this->seller = Auth::user()->id;
        $this->sales_teams = SalesTeam::isCompany(current_company()->id)->get();

        Cart::instance('quotation')->destroy();
        // Cart::instance('sale')->destroy();

    }
    public function render()
    {
        $contacts = Contact::isCompany(current_company()->id)->get();
        return view('sales::livewire.quotation.create', compact('contacts'))
        ->extends('layouts.master');
        // ->section('content');
    }

    // Store quotation
    public function storeQT(){

            // $this->validate();

            DB::transaction(function () {
                $cart = Cart::instance('quotation');
                // Remove any non-numeric characters except the decimal point
                $this->total_amount = convertToInt($cart->total());
                $this->tax_amount = convertToInt($cart->tax());

                $quotation = Quotation::create([

                    'company_id' => current_company()->id,
                    'date' => $this->date,
                    'expected_date' => $this->expected_date,
                    'payment_term' => $this->payment_term,
                    'seller_id' => $this->seller, //customer id
                    'sales_team_id' => $this->sales_team, //customer id
                    'customer_id' => $this->customer, //customer id
                    'tax_percentage' => $this->tax_percentage,
                    'discount_percentage' => $this->discount_percentage,
                    'shipping_amount' => 0,
                    'shipping_date' => $this->shipping_date,
                    'shipping_policy' => $this->shipping_policy,
                    'shipping_status' => 'Pending',
                    'total_amount' => $this->total_amount / 100,
                    'status' => $this->status,
                    'note' => $this->note,
                    'tax_amount' => $this->tax_amount,
                    'discount_amount' => $this->discount_amount,
                ]);

                foreach (Cart::instance('quotation')->content() as $cart_item) {
                    QuotationDetails::create([
                        'quotation_id' => $quotation->id,
                        'product_id' => $cart_item->id,
                        'product_name' => $cart_item->name,
                        'product_code' => $cart_item->options->code,
                        'quantity' => $cart_item->qty,
                        'price' => $cart_item->price * 100,
                        'unit_price' => $cart_item->options->unit_price * 100,
                        'sub_total' => $cart_item->options->sub_total * 100,
                        'product_discount_amount' => $cart_item->options->product_discount * 100,
                        'product_discount_type' => $cart_item->options->product_discount_type,
                        'product_tax_amount' => $cart_item->options->product_tax * 100,
                    ]);
                }

                // Cart::instance('quotation')->store(Auth::user()->id);
                Cart::instance('quotation')->destroy();

                notify()->success("Nouveau Devis créé !");

                return $this->redirect(route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $quotation->id]), navigate:true);
            });

    }

    // Store Sale directly without create quotation
    public function storeSL(){

        // $this->validate();

        DB::transaction(function () {
            $cart = Cart::instance('quotation');
            // Remove any non-numeric characters except the decimal point
            $this->total_amount = convertToInt($cart->total());
            $this->tax_amount = convertToInt($cart->tax());

            $due_amount = $this->total_amount - $this->paid_amount;

            if (isset($this->payment_method)) {
                // Access the payment_method key
                $paymentMethod = $this->payment_method;
            } else {
                // Set a default value for payment_method
                $paymentMethod = 'Cash';
            }
            if ($due_amount == $this->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            $sale = Sale::create([

                'company_id' => current_company()->id,
                'date' => $this->date,
                'seller_id' => $this->seller, //customer id
                'sales_team_id' => $this->sales_team, //customer id
                'customer_id' => $this->customer, //customer id
                'tax_percentage' => $this->tax_percentage,
                'tax_amount' => $this->tax_amount,
                'discount_percentage' => $this->discount_percentage,
                'discount_amount' => $this->discount_amount,
                'shipping_amount' => 0,
                'shipping_date' => $this->shipping_date,
                'shipping_policy' => $this->shipping_policy,
                'shipping_status' => 'Pending',
                'total_amount' => $this->total_amount / 100,
                'paid_amount' => $this->paid_amount / 100,
                'due_amount' => $this->total_amount / 100, //$due_amount
                'payment_term' => $this->payment_term,
                'payment_status' => $payment_status,
                'payment_method' => $paymentMethod,
                'status' => 'to_invoice',
                'note' => $cart->term,
            ]);
            $sale->save();

            foreach (Cart::instance('quotation')->content() as $cart_item) {
                //Create sale from quotation view without create quotation
                $salesDetail = SalesDetail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $cart_item->id,
                    'description' => $cart_item->description,
                    'product_name' => $cart_item->name,
                    'product_code' => $cart_item->options->code,
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->options->sub_total * 100,
                    'product_discount_amount' => $cart_item->options->product_discount * 100,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                    'product_tax_amount' => $cart_item->options->product_tax * 100,
                ]);
                $salesDetail->save();

                $product = Product::findOrFail($salesDetail->product_id);
                $product->update([
                    'product_quantity' => $product->product_quantity - $salesDetail->qty
                ]);
            }

            if ($sale->paid_amount > 0) {
                SalesPayment::create([
                    'company_id'=> Auth::user()->currentCompany->id,
                    'date' => now()->format('d-m-Y'),
                    'reference' => 'INV/'.$sale->reference,
                    'amount' => $sale->paid_amount,
                    'sale_id' => $sale->id,
                    'payment_method' => $paymentMethod
                ]);
            }
            // Cart::instance('quotation')->store(Auth::user()->id);
            Cart::instance('quotation')->destroy();

            notify()->success("Nouveau bon de commande créé !");

            return $this->redirect(route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id]), navigate:true);
        });

    }


    // Send Quotations via Email or Whatsapp
    // #[On('post-updated.{post.id}')]
    // public function refreshPost()
    // {
    //     // ...
    // }

    // Store and send Quotation
    public function sendQT(){
        $this->status = 'sent';
        $this->storeQT();
    }

    // Just send quotation via email or whatsapp
    public function justSendQT(){

        // $this->validate();

    }

    // SALES


    // // Confirm the quotation and create a sale
    // public function confirm(Quotation $quotation){
    //     // abort_if(Gate::denies('create_quotation_sales'), 403);

    //     // $this->validate();

    //     $this->sale($quotation);
    //     // Update status
    //     $quotation->update([
    //         'status' => 'sale_order'
    //     ]);
    //     $this->status = 'sale_order';
    // }

    // // Confirm the sale from quotation
    // public function sale($quotation){

    //     DB::transaction(function () use ($quotation) {

    //         $quotation_details = $quotation->quotationDetails;

    //         Cart::instance('quotation')->destroy();
    //         // Cart::instance('sale')->destroy();

    //         $cart = Cart::instance('sale');

    //         // Remove any non-numeric characters except the decimal point
    //         $this->total_amount = convertToInt($cart->total());
    //         $this->tax_amount = convertToInt($cart->tax());

    //         $due_amount = $this->total_amount - $this->paid_amount;

    //         if (isset($this->payment_method)) {
    //             // Access the payment_method key
    //             $paymentMethod = $this->payment_method;
    //         } else {
    //             // Set a default value for payment_method
    //             $paymentMethod = 'Cash';
    //         }
    //         if ($due_amount == $this->total_amount) {
    //             $payment_status = 'Unpaid';
    //         } elseif ($due_amount > 0) {
    //             $payment_status = 'Partial';
    //         } else {
    //             $payment_status = 'Paid';
    //         }

    //         $sale = Sale::create([

    //             'company_id'=> Auth::user()->currentCompany->id,
    //             // 'date' => $this->date,
    //             'date' => now(),
    //             // 'reference' => 'PSL',
    //             'customer_id' => 1,
    //             // 'customer_name' => Customer::findOrFail($this->customer_id)['customer_name'],
    //             'tax_percentage' => $quotation->tax_percentage == null ? 0 : $quotation->tax_percentage,
    //             'discount_percentage' => $quotation->discount_percentage == null ? 0 : $quotation->discount_percentage,
    //             'shipping_amount' => $quotation->shipping_amount,
    //             'shipping_date' => $quotation->shipping_date,
    //             'shipping_policy' => $quotation->shipping_policy,
    //             'shipping_status' => $quotation->shipping_status,
    //             'paid_amount' => $quotation->paid_amount,
    //             'total_amount' => $quotation->total_amount,
    //             'due_amount' => $quotation->total_amount, //$due_amount
    //             'status' => 'to_invoice',
    //             'payment_term' => $quotation->payment_term,
    //             'payment_status' => $payment_status,
    //             'payment_method' => $paymentMethod,
    //             'note' => $quotation->note,
    //             'tax_amount' => $quotation->tax_amount == null ? 0 : $quotation->tax_amount,
    //             'discount_amount' => 0,
    //             'seller_id' => $quotation->seller,
    //             'quotation_id' => $quotation->id,
    //         ]);
    //         $sale->save();

    //         foreach ($quotation_details as $quotation_detail) {
    //             $cart->add([
    //                 'id'      => $quotation_detail->product_id,
    //                 'name'    => $quotation_detail->product_name,
    //                 'qty'     => $quotation_detail->quantity,
    //                 'price'   => $quotation_detail->price,
    //                 'weight'  => 1,
    //                 'options' => [
    //                     'description'  => $quotation_detail->product->description,
    //                     'product_discount' => $quotation_detail->product_discount_amount,
    //                     'product_discount_type' => $quotation_detail->product_discount_type,
    //                     'sub_total'   => $quotation_detail->sub_total,
    //                     'code'        => $quotation_detail->product_code,
    //                     'stock'       => Product::findOrFail($quotation_detail->product_id)->product_quantity,
    //                     'product_tax' => $quotation_detail->product_tax_amount,
    //                     'unit_price'  => $quotation_detail->unit_price
    //                 ]
    //             ]);
    //         }

    //         // Create the saleDetails
    //         foreach ($cart->content() as $cart_item) {

    //             $sale_details = SalesDetail::create([
    //                 'sale_id' => $sale->id,
    //                 'product_id' => $cart_item->id,
    //                 'product_name' => $cart_item->name,
    //                 'product_code' => $cart_item->options->code,
    //                 'quantity' => $cart_item->qty,
    //                 'price' => $cart_item->price * 100,
    //                 'unit_price' => $cart_item->options->unit_price * 100,
    //                 'sub_total' => $cart_item->options->sub_total * 100,
    //                 'product_discount_amount' => $cart_item->options->product_discount * 100,
    //                 'product_discount_type' => $cart_item->options->product_discount_type,
    //                 'product_tax_amount' => $cart_item->options->product_tax * 100,
    //             ]);
    //             $sale_details->save();

    //             $product = Product::findOrFail($cart_item->id);
    //             $product->update([
    //                 'product_quantity' => $product->product_quantity - $cart_item->qty
    //             ]);
    //         }

    //         // $cart->destroy();

    //         return $this->redirect(route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $quotation->id]), navigate:true);

    //         // if ($sale->paid_amount > 0) {
    //         //     SalesPayment::create([
    //         //         'company_id'=> Auth::user()->currentCompany->id,
    //         //         'date' => now()->format('Y-m-d'),
    //         //         'reference' => 'INV/'.$sale->reference,
    //         //         'amount' => $sale->paid_amount,
    //         //         'sale_id' => $sale->id,
    //         //         'payment_method' => $paymentMethod
    //         //     ]);
    //         // }
    //     });
    // }

    // public function updateSale(Sale $sale){

    //     $due_amount = $this->total_amount - $this->paid_amount;

    //     if ($due_amount == $this->total_amount) {
    //         $this->payment_status = 'Unpaid';
    //     } elseif ($due_amount > 0) {
    //         $this->payment_status = 'Partial';
    //     } else {
    //         $this->payment_status = 'Paid';
    //     }

    //     foreach ($sale->saleDetails() as $sale_detail) {
    //         if ($sale->shipping_status == 'Shipped' || $sale->shipping_status == 'Completed') {
    //             $product = Product::findOrFail($sale_detail->product_id);
    //             $product->update([
    //                 'product_quantity' => $product->product_quantity + $sale_detail->quantity
    //             ]);
    //         }
    //         $sale_detail->delete();
    //     }
    //     DB::transaction(function() use ($sale) {

    //         $sale->update([
    //             'date' => $this->date,
    //             'payment_status' => $this->payment_status,
    //             'payment_term' => $this->payment_term,
    //             'payment_method' => $this->payment_method,
    //             'seller_id' => $this->seller, //customer id
    //             'sales_team_id' => $this->sales_team, //customer id
    //             'customer_id' => 1, //customer id
    //             'tax_percentage' => 18.9,
    //             'discount_percentage' => 0,
    //             'shipping_amount' => 0,
    //             'shipping_date' => $this->shipping_date,
    //             'shipping_policy' => $this->shipping_policy,
    //             'shipping_status' => $this->shipping_status,
    //             'total_amount' => $this->total_amount / 100,
    //             'paid_amount' => $this->paid_amount,
    //             'due_amount' => $this->total_amount / 100, //$due_amount
    //             'status' => 'to_invoice',
    //             // 'status' => $this->status,
    //             'note' => $this->note,
    //             'tax_amount' => $this->tax_amount,
    //             'discount_amount' => 0,
    //         ]);

    //         $cart = Cart::instance('sale');

    //         foreach ($cart->content() as $cart_item) {
    //             SalesDetail::create([
    //                 'sale_id' => $sale->id,
    //                 'product_id' => $cart_item->id,
    //                 'product_name' => $cart_item->name,
    //                 'product_code' => $cart_item->options->code,
    //                 'quantity' => $cart_item->qty,
    //                 'price' => $cart_item->price * 100,
    //                 'unit_price' => $cart_item->options->unit_price * 100,
    //                 'sub_total' => $cart_item->options->sub_total * 100,
    //                 'product_discount_amount' => $cart_item->options->product_discount * 100,
    //                 'product_discount_type' => $cart_item->options->product_discount_type,
    //                 'product_tax_amount' => $cart_item->options->product_tax * 100,
    //             ]);

    //             // Update Cart
    //             // $this->updateCart($cart, $cart_item);
    //         }

    //         if ($this->shipping_status == 'Shipped' || $this->shipping_status == 'Completed') {
    //             $product = Product::findOrFail($cart_item->id);
    //             $product->update([
    //                 'product_quantity' => $product->product_quantity - $cart_item->qty
    //             ]);
    //         }

    //         Cart::instance('sale')->destroy();

    //     });
    // }

    // public function updateCart($cart, $sale_detail){
    //     Cart::update($sale_detail->rowId, $sale_detail->qty);
    // }

}
