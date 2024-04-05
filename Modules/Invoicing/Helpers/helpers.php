<?php

use Modules\Invoicing\Entities\Tax\Tax;

if (!function_exists('sales_tax')) {
    function sales_tax() {
        $default = Tax::find(settings()->default_sales_tax_id);
        return $default;
    }
}

if (!function_exists('calculate_product_ttc')) {
    function calculate_product_ttc($cart_instance, $price, $tax) {
        if($cart_instance == 'sale' || $cart_instance == 'quotation'){
            $tax = Tax::where('amount', $tax)->first();
        }
        $default = Tax::find(settings()->default_sales_tax_id);
        return $default;
    }
}

if (!function_exists('calculate_ttc_price')) {
    function calculate_ttc_price($price, $tax) {
        $default = Tax::find($tax);
        $tax_amount = ($price * $default->amount) / 100;
        $ttc = $price + $tax_amount;
        return $ttc;
    }
}

