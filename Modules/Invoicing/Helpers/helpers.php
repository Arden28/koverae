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

// Helper function to calculate item price
if (!function_exists('calculate_item_price')) {
    function calculate_item_price($item, $customer = null, $discount = null) {
        // Base price from the item
        $basePrice = $item->product_price;

        // Initialize a variable to accumulate tax amounts
        $totalTax = 0;

        // Apply tax based on item's tax rate (fixed or percentage)
        if ($item->taxes['sale']) {
            foreach ($item->taxes['sale'] as $tax) {
                $tax = Tax::find($tax);
                if ($tax->calculation_type === 'percentage') {
                    $taxAmount = ($basePrice * $tax->amount) / 100;
                } else {
                    $taxAmount = $tax->amount;
                }

                // Check if tax is inclusive or exclusive
                if ($tax->application_type === 'inclusive') {
                    $basePrice = $basePrice - $taxAmount;
                } else {
                    // exclusive
                    $totalTax += $taxAmount;
                }
            }
        }

        // Add exclusive taxes to the base price
        $finalPrice = $basePrice + $totalTax;

        // Optionally apply a discount
        if ($discount) {
            $finalPrice -= $finalPrice * ($discount / 100);
        }

        return $finalPrice / 100;  // Adjusting the final price scale if necessary
    }
}


// Helper function to calculate item cost
if (!function_exists('calculate_item_cost')){
    function calculate_item_cost($item, $customer = null, $discount = null){
        // Base cost from the item
        $baseCost = $item->product_cost;

        // Apply tax based on item's tax rate (fixed or percentage)
        if ($item->taxes['purchase']) {
            foreach($item->taxes['purchase'] as $tax){
                $tax = Tax::find($tax);
                $baseCost += $tax->calculation_type === 'percentage' ? ($baseCost * ($tax->amount / 100)) : $tax->amount;
            }
        }

        return $baseCost / 100;
    }
}
