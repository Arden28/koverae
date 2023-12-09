<?php

namespace Modules\Sales\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Modules\Sales\Entities\Quotation\Quotation;
use Modules\Sales\Entities\Quotation\QuotationDetails;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class QuotationService{

    public function createQuotation(array $data)
    {
        // return Quotation::create($data);

            DB::transaction(function () use ($data) {
                $cart = Cart::instance('quotation');
                // Remove any non-numeric characters except the decimal point
                $data['total_amount'] = convertToInt($cart->total());
                $data['tax_amount'] = convertToInt($cart->tax());

                $quotation = Quotation::create([
                    'company_id' => current_company()->id,
                    'date' => $data['date'],
                    'expected_date' => $data['expected_date'],
                    'payment_term' => $data['payment_term'],
                    'seller_id' => $data['seller'], //customer id
                    'sales_team_id' => $data['sales_team'], //customer id
                    'customer_id' => $data['customer'], //customer id
                    'tax_percentage' => $data['tax_percentage'],
                    'discount_percentage' => $data['discount_percentage'],
                    'shipping_amount' => 0,
                    'shipping_date' => $data['shipping_date'],
                    'shipping_policy' => $data['shipping_policy'],
                    'shipping_status' => 'Pending',
                    'total_amount' => $data['total_amount'] / 100,
                    'status' => $data['status'],
                    'note' => $data['note'],
                    'tax_amount' => $data['tax_amount'],
                    'discount_amount' => $data['discount_amount'],
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

                // return $this->redirect(route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $quotation->id]), navigate:true);
            });

    }

}
