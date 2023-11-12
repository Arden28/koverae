<?php

namespace Modules\Sales\Livewire\Sale;

use Livewire\Component;

class Create extends Component
{
    public $customer,

    $date,

    $expected_date,

    $payment_term = 'immediate_payment',
    $reference = 'SL',
    $tax_percentage,
    $tax_amount,
    $discount_percentage,
    $shipping_amount,
    $total_amount = 0,
    $status = 'sale_order',
    $note,

    $seller,

    $sales_team = 'sales',

    $tags,

    $shipping_policy,

    $shipping_date;

    public $pist, $campaign, $delivery_mode, $source;

    public $updateMode = false;

    protected $rules = [
        'customer' => 'required',
        'expected_date' => 'nullable',
        'payment_term' => 'required',
        // 'tax_percentage' => 'required|integer|min:0|max:100',
        // 'discount_percentage' => 'required|integer|min:0|max:100',
        // 'shipping_amount' => 'required|numeric',
        // 'total_amount' => 'required|numeric',
        'status' => 'required|string|max:255',
        'note' => 'nullable|string|max:1000',
        'seller' => 'required',
        'sales_team' => 'required',
        'tags' => 'nullable',
        'shipping_policy' => 'nullable',
        'shipping_date' => 'nullable',
        'pist' => 'nullable|string',
        'campaign' => 'nullable|string',
        'delivery_mode' => 'nullable|string',
        'source' => 'nullable|string',
    ];
    public function render()
    {
        return view('sales::livewire.sale.create')
        ->extends('layouts.master')
        ->section('content');
    }

}
