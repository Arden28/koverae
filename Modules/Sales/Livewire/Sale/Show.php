<?php

namespace Modules\Sales\Livewire\Sale;

use Livewire\Component;
use Modules\Sales\Entities\Quotation\Quotation;
use Modules\Sales\Entities\Quotation\QuotationDetails;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesDetail;
use Modules\Sales\Entities\SalesPayment;
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeam;
use Modules\Contact\Entities\Contact;
use Modules\Invoicing\Entities\Customer\Invoice;
use Modules\Invoicing\Entities\Customer\InvoiceDetails;
use Carbon\Carbon;

class Show extends Component
{
    public Sale $sale;

    public $cartInstance = 'sale';

    public $customer, $customer_name,

    $date,

    $expected_date,

    $payment_term ,
    $reference,
    $tax_percentage,
    $tax_amount,
    $discount_percentage,
    $discount_amount,
    $shipping_amount,
    $paid_amount = 0,
    $due_amount = 0,
    $total_amount = 0,
    $payment_method,
    $payment_status,
    $status,
    $note,

    $seller,

    $sellers = [],

    $sales_team,

    $sales_teams = [],

    $tags,

    $shipping_policy,

    $shipping_date,

    $shipping_status,

    $tag;
    // public $qty = 1;

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

    public function mount(Sale $sale){

        // Cart::instance('quotation')->destroy();

        Cart::instance('sale')->destroy();

        $this->sale= $sale;
            // Set values
            $this->customer = $sale->customer_id;
            $this->customer_name = Contact::findOrFail($sale->customer_id)->name;
            $this->date = $sale->date;
            $this->expected_date = $sale->expected_date;
            $this->payment_term = $sale->payment_term;
            $this->payment_status = $sale->payment_status;
            $this->payment_method = $sale->payment_method;
            $this->reference = $sale->reference;
            $this->tax_percentage = $sale->tax_percentage;
            $this->tax_amount = $sale->tax_amount;
            $this->discount_percentage = $sale->discount_percentage;
            $this->shipping_amount = $sale->shipping_amount;
            $this->total_amount = $sale->total_amount;
            $this->paid_amount = $sale->paid_amount;
            $this->due_amount = $sale->total_amount;
            $this->status = $sale->status;
            $this->note = $sale->note;
            $this->seller = $sale->seller_id;
            $this->sales_team = $sale->sales_team_id;
            // $this->tags = $sale->tags;
            $this->shipping_date = $sale->shipping_date;
            $this->shipping_policy = $sale->shipping_policy;
            $this->shipping_status = $sale->shipping_status;

            // Update the cart
            $sale_details = $sale->saleDetails;



            $cart = Cart::instance('sale');

            foreach ($sale_details as $sale_detail) {
                $cart->add([
                    'id'      => $sale_detail->product_id,
                    'name'    => $sale_detail->product_name,
                    'qty'     => $sale_detail->quantity,
                    'price'   => $sale_detail->price / 100,
                    'weight'  => 1,
                    'options' => [
                        'product_discount' => $sale_detail->product_discount_amount / 100,
                        'product_discount_type' => $sale_detail->product_discount_type,
                        'sub_total'   => $sale_detail->sub_total / 100,
                        'code'        => $sale_detail->product_code,
                        'stock'       => Product::findOrFail($sale_detail->product_id)->product_quantity,
                        'product_tax' => $sale_detail->product_tax_amount,
                        'unit_price'  => $sale_detail->unit_price / 100
                    ]
                ]);

                // $cart->destroy();
            }
    }
    public function render()
    {
        $contacts = Contact::isCompany(current_company()->id)->get();
        $invoices = Invoice::isCompany(current_company()->id)->isSale($this->sale->id)->get();
        $teams = SalesTeam::isCompany(current_company()->id)->get();
        $people = SalesPerson::isCompany(current_company()->id)->get();
        return view('sales::livewire.sale.show', compact('contacts', 'invoices', 'teams', 'people'))
        ->extends('layouts.master');
        // ->section('content');
    }

    // Delete Sale
    public function deleteSale(Sale $sale){
        abort_if(Gate::denies('delete_sales'), 403);
        $sale->delete();

        return $this->redirect(route('sales.index', ['subdomain' => current_company()->domain_name]), navigate:true);
    }

    public function duplicateSale(Sale $sale){

        DB::transaction(function () use ($sale) {

            $sale_details = $sale->saleDetails;

            Cart::instance('sale')->destroy();

            $cart = Cart::instance('sale');

            $due_amount = $sale->total_amount - $sale->paid_amount;

            if (isset($sale->payment_method)) {
                // Access the payment_method key
                $paymentMethod = $sale->payment_method;
            } else {
                // Set a default value for payment_method
                $paymentMethod = 'Cash';
            }
            if ($due_amount == $sale->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }


            $d_sale = Sale::create([

                'company_id'=> Auth::user()->currentCompany->id,
                // 'date' => $this->date,
                'date' => now(),
                // 'reference' => 'PSL',
                'customer_id' => $sale->customer_id,
                // 'customer_name' => Customer::findOrFail($this->customer_id)['customer_name'],
                'tax_percentage' => $sale->tax_percentage == null ? 0 : $sale->tax_percentage,
                'discount_percentage' => $sale->discount_percentage == null ? 0 : $sale->discount_percentage,
                'shipping_amount' => $sale->shipping_amount,
                'shipping_date' => $sale->shipping_date,
                'shipping_policy' => $sale->shipping_policy,
                'shipping_status' => $sale->shipping_status,
                'paid_amount' => $sale->paid_amount,
                'total_amount' => $sale->total_amount,
                'due_amount' => $sale->total_amount, //$due_amount
                'status' => 'to_invoice',
                'payment_term' => $sale->payment_term,
                'payment_status' => $payment_status,
                'payment_method' => $paymentMethod,
                'note' => $sale->note,
                'tax_amount' => $sale->tax_amount == null ? 0 : $sale->tax_amount,
                'discount_amount' => 0,
                'seller_id' => $sale->seller_id,
                'sales_team_id' => $sale->sales_team_id,
                // 'quotation_id' => $sale->id,
            ]);
            $d_sale->save();

            foreach ($sale_details as $sale_detail) {
                $cart->add([
                    'id'      => $sale_detail->product_id,
                    'name'    => $sale_detail->product_name,
                    'qty'     => $sale_detail->quantity,
                    'price'   => $sale_detail->price,
                    'weight'  => 1,
                    'options' => [
                        // 'description'  => $sale_detail->product->description,
                        'product_discount' => $sale_detail->product_discount_amount,
                        'product_discount_type' => $sale_detail->product_discount_type,
                        'sub_total'   => $sale_detail->sub_total,
                        'code'        => $sale_detail->product_code,
                        'stock'       => Product::findOrFail($sale_detail->product_id)->product_quantity,
                        'product_tax' => $sale_detail->product_tax_amount,
                        'unit_price'  => $sale_detail->unit_price
                    ]
                ]);
            }

            // Create the saleDetails
            foreach (Cart::instance('sale')->content() as $cart_item) {

                $d_sale_detail = SalesDetail::create([
                    'sale_id' => $d_sale->id,
                    'product_id' => $cart_item->id,
                    'product_name' => $cart_item->name,
                    'product_code' => $cart_item->options->code,
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price,
                    'unit_price' => $cart_item->options->unit_price,
                    'sub_total' => $cart_item->options->sub_total,
                    'product_discount_amount' => $cart_item->options->product_discount,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                    'product_tax_amount' => $cart_item->options->product_tax,
                ]);
                $d_sale_detail->save();

                $product = Product::findOrFail($cart_item->id);
                $product->update([
                    'product_quantity' => $product->product_quantity - $cart_item->qty
                ]);
            }

            Cart::instance('sale')->destroy();

            return $this->redirect(route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $d_sale->id]), navigate:true);
        });
    }

    // Create Invoice
    public function createInvoice(Sale $sale){

        $invoice = Invoice::create([
            'company_id' => $sale->company_id,
            'sale_id' => $sale->id,
            'customer_id' => $sale->customer_id,
            'reference' => 'INV/'.$sale->reference,
            'date' => $sale->date,
            'due_date' => $sale->expected_date,
            'shipping_date' => $sale->shipping_date,
            'payment_term' => $sale->payment_term,
            'payment_status' => 'Unpaid',
            'seller_id' => $sale->seller_id,
            'terms' => $sale->terms,
            'total_amount' => $sale->total_amount * 100,
            'paid_amount' => $sale->paid_amount * 100,
            'due_amount' => $sale->due_amount * 100,
            'status' => 'draft',
            'payment_status' => '',
            'to_checked' => false,
        ]);
        $invoice->save();

        $sale->update([
            'status' => 'invoiced',
        ]);

        // $invoiceDetails = $invoice->invoiceDetails;
            $sale_details = $sale->saleDetails;

        foreach($sale_details as $detail) {
            //Create sale from quotation view without create quotation
            invoiceDetails::create([
                'customer_invoice_id' => $invoice->id,
                'product_id' => $detail->product_id,
                'label' => $detail->product_name,
                'product_name' => $detail->product_name,
                'quantity' => $detail->quantity,
                'price' => $detail->price,
                'unit_price' => $detail->unit_price,
                'sub_total' => $detail->sub_total,
                'product_discount_amount' => $detail->product_discount_amount,
                'product_discount_type' => $detail->product_discount_type,
                'product_tax_amount' => $detail->product_tax_amount,
            ]);

        }

        Cart::instance('sale')->destroy();

        return $this->redirect(route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'invoice' => $invoice->id]), navigate:true);

    }

}
