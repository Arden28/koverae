<?php

if (!function_exists('sale_settings')) {
    function sale_settings() {
        $settings = cache()->remember('sale_settings', 24*60, function () {
            return \Modules\Sales\Entities\Setting\SalesSetting::isCompany(current_company()->id)
            ->first();
        });

        return $settings;
    }
}
