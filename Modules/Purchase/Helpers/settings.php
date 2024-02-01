<?php

if (!function_exists('purchase_settings')) {
    function purchase_settings() {
        $settings = cache()->remember('purchase_settings', 24*60, function () {
            return \Modules\Purchase\Entities\Setting\PurchaseSetting::isCompany(current_company()->id)
            ->first();
        });

        return $settings;
    }
}
