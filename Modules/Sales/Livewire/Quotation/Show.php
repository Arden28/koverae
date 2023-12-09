<?php

namespace Modules\Sales\Livewire\Quotation;

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
use Modules\Contact\Entities\Contact;
use Livewire\Attributes\On;
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeam;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public Quotation $quotation;

    public $cartInstance = 'quotation';

    public $customer, $customer_name,

    $date,

    $expected_date,

    $payment_term = 'immediate_payment',
    $reference,
    $tax_percentage = 0,
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

    $shipping_status,

    $tag;

    public $qty = 1;

    protected $rules = [
        'customer' => 'required',
        // 'date' => 'required',
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

    public function mount(Quotation $quotation){

        $this->quotation = $quotation;

        $this->customer = $quotation->customer_id;
        $this->customer_name = Contact::findOrFail($quotation->customer_id)->name;
        $this->date = $quotation->date;
        $this->expected_date = $quotation->expected_date;
        $this->payment_term = $quotation->payment_term;
        $this->reference = $quotation->reference;
        $this->tax_percentage = $quotation->tax_percentage;
        $this->tax_amount = $quotation->tax_amount;
        $this->discount_percentage = $quotation->discount_percentage;
        $this->shipping_amount = $quotation->shipping_amount;
        $this->total_amount = $quotation->total_amount;
        $this->status = $quotation->status;
        $this->note = $quotation->note;
        $this->seller = $quotation->seller_id;
        $this->sales_team = $quotation->sales_team_id;
        $this->tags = $quotation->tags;
        $this->shipping_date = $quotation->shipping_date;
        $this->shipping_policy = $quotation->shipping_policy;
        $this->shipping_status = $quotation->shipping_status;

        // Update the cart
        $quotation_details = $quotation->quotationDetails;

        Cart::instance('quotation')->destroy();

        $cart = Cart::instance('quotation');

        foreach ($quotation_details as $quotation_detail) {
            $cart->add([
                'id'      => $quotation_detail->product_id,
                'name'    => $quotation_detail->product_name,
                'qty'     => $quotation_detail->quantity,
                'price'   => $quotation_detail->price,
                'weight'  => 1,
                'options' => [
                    'description'  => $quotation_detail->product->description,
                    'product_discount' => $quotation_detail->product_discount_amount,
                    'product_discount_type' => $quotation_detail->product_discount_type,
                    'sub_total'   => $quotation_detail->sub_total,
                    'code'        => $quotation_detail->product_code,
                    'stock'       => Product::findOrFail($quotation_detail->product_id)->product_quantity,
                    'product_tax' => $quotation_detail->product_tax_amount,
                    'unit_price'  => $quotation_detail->unit_price
                ]
            ]);
        }
    }

    public function render()
    {
        $contacts = Contact::isCompany(current_company()->id)->get();
        $sales = Sale::isCompany(current_company()->id)->isQuotation($this->quotation->id)->get();
        $teams = SalesTeam::isCompany(current_company()->id)->get();
        $people = SalesPerson::isCompany(current_company()->id)->get();
        return view('sales::livewire.quotation.show', compact('contacts', 'sales', 'teams', 'people'))
        ->extends('layouts.master')
        ->section('content');
    }

    public function updateQT(Quotation $quotation){

            // $this->validate();

            DB::transaction(function () use ($quotation) {

                foreach ($quotation->quotationDetails as $quotation_detail) {
                    $quotation_detail->delete();
                }

                $quotation->update([

                    // 'company_id' => current_company()->id,
                    // 'date' => $this->date,
                    'expected_date' => $this->expected_date,
                    'payment_term' => $this->payment_term,
                    'seller_id' => $this->seller, //customer id
                    'sales_team_id' => $this->sales_team, //customer id
                    'customer_id' => 1, //customer id
                    'tax_percentage' => $this->tax_percentage, //tax percentage
                    'discount_percentage' => $this->discount_percentage, //discount percentage
                    'discount_amount' => $this->discount_amount ?? 0, //discount percentage
                    'shipping_amount' => $this->shipping_amount,
                    'shipping_date' => $this->shipping_date,
                    'shipping_policy' => $this->shipping_policy,
                    'shipping_status' => $this->shipping_status,
                    'total_amount' => convertToInt(Cart::instance('quotation')->total()) / 100,
                    'status' => $this->status,
                    'note' => $this->note,
                    'tax_amount' => convertToInt(Cart::instance('quotation')->tax()),
                    'discount_amount' => $this->discount_amount,
                ]);
                $quotation->save();

                // Remove any non-numeric characters except the decimal point
                // $this->total_amount = convertToInt($cart->total());
                // $this->tax_amount = convertToInt($cart->tax());

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

                Cart::instance('quotation')->destroy();
            });

            return $this->redirect(route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $quotation->id]), navigate:true);

        // notify()->success("Votre devis a été créer !");
        // return redirect()->route('sales.quotations.index', ->subdomain' => current_company()->domain_name]);
    }

    // Just send Email
    public function justSendQT(Quotation $quotation){

        $quotation->update([
            'status' => 'send',
        ]);
    }

    // Confirm the quotation and create a sale
    public function confirm(Quotation $quotation){
        // abort_if(Gate::denies('create_quotation_sales'), 403);

        // $this->validate();

        // Update status
        $quotation->update([
            'status' => 'sale_order'
        ]);
        $this->sale($quotation);
        // $this->status = 'sale_order';
    }

    // Confirm the sale from quotation
    public function sale($quotation){

        DB::transaction(function () use ($quotation) {

            $quotation_details = $quotation->quotationDetails;

            Cart::instance('quotation')->destroy();
            Cart::instance('sale')->destroy();

            $cart = Cart::instance('sale');

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

                'company_id'=> Auth::user()->currentCompany->id,
                // 'date' => $this->date,
                'date' => now(),
                // 'reference' => 'PSL',
                'customer_id' => $quotation->customer_id,
                // 'customer_name' => Customer::findOrFail($this->customer_id)['customer_name'],
                'tax_percentage' => $quotation->tax_percentage == null ? 0 : $quotation->tax_percentage,
                'discount_percentage' => $quotation->discount_percentage == null ? 0 : $quotation->discount_percentage,
                'shipping_amount' => $quotation->shipping_amount * 100,
                'shipping_date' => $quotation->shipping_date,
                'shipping_policy' => $quotation->shipping_policy,
                'shipping_status' => $quotation->shipping_status,
                'paid_amount' => $quotation->paid_amount * 100,
                'total_amount' => $quotation->total_amount * 100,
                'due_amount' => $quotation->total_amount * 100, //$due_amount
                'status' => 'to_invoice',
                'payment_term' => $quotation->payment_term,
                'payment_status' => $payment_status,
                'payment_method' => $paymentMethod,
                'note' => $quotation->note,
                'tax_amount' => $quotation->tax_amount == null ? 0 : $quotation->tax_amount * 100,
                'discount_amount' => 0,
                'seller_id' => $quotation->seller->id,
                'sales_team_id' => $quotation->seller->sales_team_id, //customer id
                'quotation_id' => $quotation->id,
            ]);
            $sale->save();

            foreach ($quotation_details as $quotation_detail) {
                $cart->add([
                    'id'      => $quotation_detail->product_id,
                    'name'    => $quotation_detail->product_name,
                    'qty'     => $quotation_detail->quantity,
                    'price'   => $quotation_detail->price,
                    'weight'  => 1,
                    'options' => [
                        'description'  => $quotation_detail->product->description,
                        'product_discount' => $quotation_detail->product_discount_amount,
                        'product_discount_type' => $quotation_detail->product_discount_type,
                        'sub_total'   => $quotation_detail->sub_total,
                        'code'        => $quotation_detail->product_code,
                        'stock'       => Product::findOrFail($quotation_detail->product_id)->product_quantity,
                        'product_tax' => $quotation_detail->product_tax_amount,
                        'unit_price'  => $quotation_detail->unit_price
                    ]
                ]);
            }

            // Create the saleDetails
            foreach ($cart->content() as $cart_item) {

                $sale_details = SalesDetail::create([
                    'sale_id' => $sale->id,
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
                $sale_details->save();

                $product = Product::findOrFail($cart_item->id);
                $product->update([
                    'product_quantity' => $product->product_quantity - $cart_item->qty
                ]);
            }

            // $cart->destroy();

            return $this->redirect(route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id]), navigate:true);

            // if ($sale->paid_amount > 0) {
            //     SalesPayment::create([
            //         'company_id'=> Auth::user()->currentCompany->id,
            //         'date' => now()->format('Y-m-d'),
            //         'reference' => 'INV/'.$sale->reference,
            //         'amount' => $sale->paid_amount,
            //         'sale_id' => $sale->id,
            //         'payment_method' => $paymentMethod
            //     ]);
            // }
        });
    }

    // #[On('productSelected')]
    public function canceled(Quotation $quotation){

        $quotation->update([
            'status' => 'canceled',
        ]);
        $quotation->save();

        $this->status = $quotation->status;
        // $this->dispatch('canceledQuotation', $quotation);
    }

    // Print Quotation
    public function print(Quotation $quotation){

        // $quotation = Quotation::findOrFail($this->quotation->id);
        try {
            // $quotation = Quotation::find(38);

            if (!$quotation) {
                throw new \Exception('Quotation not found');
            }

            $customer = Contact::findOrFail($quotation->customer_id);
            $seller = SalesPerson::findOrFail($quotation->seller_id);
            $company = current_company();

            $pdf = Pdf::loadView('sales::print-quotation', [
                'quotation' => $quotation,
                'customer' => $customer,
                'seller' => $seller,
                'company' => $company
            ])->setPaper('a4');

            // $folderPath = "companies/{$company->name}/files/quotations";
            // $filePath = "$folderPath/{$quotation->reference}.pdf";

            // // Check if the file already exists
            // if (Storage::exists($filePath)) {
            //     // Delete the existing file
            //     Storage::delete($filePath);
            // }

            // // Ensure the directory exists, create it if not
            // Storage::makeDirectory($folderPath);

            // // Save the PDF to the storage
            // Storage::put($filePath, $pdf->output());


            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output(); // Echo download contents directly...
            }, 'Devis -' . $quotation->reference . '.pdf');

            // return response($utf8Output)->download('quotation-' . $quotation->reference . '.pdf');
        } catch (\Exception $e) {
            Log::error('Error generating quotation PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }

}
