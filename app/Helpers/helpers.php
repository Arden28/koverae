<?php

use App\Models\Company\Company;
use App\Models\Module\InstalledModule;
use App\Models\Module\Module;
use App\Models\Team\Team;
use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Modules\Settings\Entities\Currency;

if (!function_exists('domains')) {
    function domains() {
        $companies = Company::all();

        $subdomains = $companies->pluck('domain_name'); // Pluck the 'subdomain' field from each company

        return $subdomains;
    }
}

if (!function_exists('modules')) {
    function modules() {
        $modules = Module::all();

        return $modules;
    }
}

if(!function_exists('current_company')){
    function current_company() {

        if (session()->has('current_company')) {
            // The 'current_company' session variable is available
            // You can access it like this:
            $currentCompany = session('current_company');

            // Perform actions with $currentCompany
            return $currentCompany;
        } else {
            // The 'current_company' session variable is not available
            // Handle the case when the session is not active or the variable is not set
        }

    }
}

if (!function_exists('team')) {
    function team() {
        // $team = App\Models\Team::find('id', $id)->first();
        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();
        return $team;
    }
}


if (!function_exists('module')) {
    function module($slug) {

        // $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();

        $module = Module::findBySlug($slug)->first();

        $company = Company::find(current_company()->id);

        if($module){
            return $module->isInstalledBy($company);
        }else{
            return false;
        }
    }
}


if(!function_exists('installed_apps')){
    function installed_apps($company){
        $installed_apps = InstalledModule::where('company_id', $company->id)->get();
        return $installed_apps;
    }
}


if (!function_exists('subscribed')) {
    function subscribed($id) {
        $subscribed = PlanSubscription::where('subscriber_id', $id)->first();

        if($subscribed){
            return $subscribed;
        }
    }
}

if (!function_exists('settings')) {
    function settings() {
        $settings = cache()->remember('settings', 24*60, function () {
            return \Modules\Settings\Entities\Setting::where('company_id', current_company()->id)
            ->first();
        });

        return $settings;
    }
}

if (!function_exists('updated_menu')) {
    function updated_menu($module) {

        $storedArray = Cache::get('current_menu');

        // Check if the array exists in the cache
        if ($storedArray != null) {
            // Modify the array as needed
            $storedArray['name'] = $module->name;
            $storedArray['path'] = $module->path;
            $storedArray['id'] = $module->navbar_id;
            $storedArray['slug'] = $module->slug;

            // Store the modified array back in the cache with the same key
            $navbar = Cache::put('current_menu', $storedArray, 60); // Adjust the expiration time if needed
            return $navbar;
        }

        // Storing the array in the cache with a key and expiration time (in minutes)
        $cookie = Cache::put('current_menu', [
            'name' => $module->name,
            'path' => $module->path,
            'id' => $module->navbar_id,
            'slug' => $module->slug
        ],
        120);

        return $cookie;


        // No need to return a value here, as Cache::put doesn't return anything
    }
}
// Current Menu
if (!function_exists('update_menu')) {
    function update_menu($navbar){
        // Store company information in the session or a cookie
        $menu = session(['current_menu' => $navbar]);

        return $menu;
    }
}


if (!function_exists('current_menu')) {
    function current_menu() {

        // Retrieve the current array from the cache

        $menu = session('current_company');
        return $menu;

    }
}


if (!function_exists('format_currency')) {
    function format_currency($value, $format = true) {
        if (!$format) {
            return $value;
        }

        $settings = settings();
        $currency = settings()->currency;
        $position = $currency->symbol_position;
        $symbol = $currency->symbol;
        $decimal_separator = $currency->decimal_separator;
        $thousand_separator = $currency->thousand_separator;

        if ($position == 'prefix') {
            $formatted_value = $symbol . number_format((float) $value, 2, $decimal_separator, $thousand_separator);
        } else {
            $formatted_value = number_format((float) $value, 2, $decimal_separator, $thousand_separator) .' '. $symbol;
        }

        return $formatted_value;
    }
}

if (!function_exists('make_reference_id')) {
    function make_reference_id($prefix, $number) {
        $padded_text = $prefix . '-' . str_pad($number, 5, 0, STR_PAD_LEFT);

        return $padded_text;
    }
}

if (!function_exists('make_reference_with_id')) {
    function make_reference_with_id($prefix, $number, $year) {
        $padded_text = $prefix . '/'.$year.'/'. str_pad($number, 5, 0, STR_PAD_LEFT);

        return $padded_text;
    }
}

if (!function_exists('make_reference_with_month_id')) {
    function make_reference_with_month_id($prefix, $number, $year, $month) {
        $padded_text = $prefix . '/'.$year. '/'.$month.'/'. str_pad($number, 5, 0, STR_PAD_LEFT);

        return $padded_text;
    }
}

if (!function_exists('array_merge_numeric_values')) {
    function array_merge_numeric_values() {
        $arrays = func_get_args();
        $merged = array();
        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (!is_numeric($value)) {
                    continue;
                }
                if (!isset($merged[$key])) {
                    $merged[$key] = $value;
                } else {
                    $merged[$key] += $value;
                }
            }
        }

        return $merged;
    }
}

if (!function_exists('convertToInt')) {
    function convertToInt($value){
        // Assuming $cart->total() returns a string like "12.500,00"
        $totalString = $value;

        // Remove commas and dots from the string and keep only digits
        $totalWithoutCommasAndDots = str_replace([',', '.'], '', $totalString);

        // Convert the resulting string to an integer
        $value = (int) $totalWithoutCommasAndDots * 100;

        return $value;
    }
}

if (!function_exists('convertToIntSimple')) {
    function convertToIntSimple($value){
        // Assuming $cart->total() returns a string like "12.500,00"
        $totalString = $value;

        // Remove commas and dots from the string and keep only digits
        $totalWithoutCommasAndDots = str_replace([',', '.'], '', $totalString);

        // Convert the resulting string to an integer
        $value = (int) $totalWithoutCommasAndDots;

        return $value;
    }
}


// Payment Term
if(!function_exists('payment_term')){
    function payment_term($type){
        switch ($type) {
            case 'immediate_payment':
                return 'Paiement immediat';
            case '7_days':
                return '7 Jours';
            case '15_days':
                return '15 Jours';
            case '21_days':
                return '21 Jours';
            case '30_days':
                return '30 Jours';
            case '45_days':
                return '45 Jours';
            case 'end_of_next_month':
                return 'Fin du mois suivant';
            default:
                return 'Non fixée';
        }
    }
}

// Receipt Number
if (!function_exists('receipt_number')) {
    function receipt_number($reference) {
        $matches = null; // or initialize with any default value

        // Use preg_match to find the number in the string
        if (preg_match("/\d+/", $reference, $matches)) {
            // Check if the match is found
            $number = $matches[0];
        }

        return $number;
    }
}
