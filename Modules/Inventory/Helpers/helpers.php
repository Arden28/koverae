<?php

if (!function_exists('storage_locations')) {
    function storage_locations() {
            return true;
    }
}

if (!function_exists('location_name')) {
    function location_name($location) {
        if($location->parent){
            return $location->parent->name.'/'.$location->name;
        }else{
            return $location->name;
        }
    }
}

if (!function_exists('transfer_type')) {
    function transfer_type($type) {
        $name = '';
        if($type == 'receipt'){
            $name = __('Réception');
        }elseif($type == 'delivery'){
            $name = __('Livraisons');
        }elseif($type == 'internal_transfer'){
            $name = __('Transferts Internes');
        }elseif($type == 'manufacturing'){
            $name = __('Productions');
        }
        return $name;
    }
}

// Stock prévisionnel
if (!function_exists('forecast_stock')) {
    function forecast_stock($product) {
        $unit = $product->unit;
        $currentStock = $product->product_quantity;

        // Calculate the sum of quantities bought and sold in the last $days
        $bought = $product->bought()->sum('quantity');
        $sold = $product->sold()->sum('quantity');

        $forecast = $currentStock + ($bought - $sold);

        return $currentStock . ' ' . $unit->name;
    }
}

// Stock prévisionnel sur le temps
if (!function_exists('forecast_stock_timed')) {
    function forecast_stock_timed($product, $days = 30) {
        $unit = $product->unit;
        $currentStock = $product->product_quantity;

        // Calculate the sum of quantities bought and sold in the last $days
        $bought = $product->bought()->where('created_at', '>', now()->subDays($days))->sum('quantity');
        $sold = $product->sold()->where('created_at', '>', now()->subDays($days))->sum('quantity');

        // Calculate average daily sales and purchases
        $avgDailySales = $sold / $days;
        $avgDailyPurchases = $bought / $days;

        // Forecast for the next period (e.g., next 30 days)
        $forecast = $currentStock + ($avgDailyPurchases - $avgDailySales) * $days;

        return round($forecast, 2) . ' ' . $unit->name;
    }
}
