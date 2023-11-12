<?php

use App\Models\Company\Company;
use App\Models\Module\InstalledModule;
use App\Models\Module\Module;
use App\Models\Team\Team;
use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanSubscription;
use Illuminate\Support\Facades\Auth;

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
    function team($id) {
        // $team = App\Models\Team::find('id', $id)->first();
        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();
        return $team;
    }
}


if (!function_exists('module')) {
    function module($slug) {

        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();

        $module = Module::where('slug', $slug)->first();

        if($module->isInstalledBy($team)){
            return $module->isInstalledBy($team);
        }
    }
}


if(!function_exists('installed_apps')){
    function installed_apps($team){
        $installed_apps = InstalledModule::where('team_id', $team->id)->get();
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


if (!function_exists('format_currency')) {
    function format_currency($value, $format = true) {
        if (!$format) {
            return $value;
        }

        $settings = settings();
        $position = $settings->default_currency_position;
        $symbol = $settings->currency->symbol;
        $decimal_separator = $settings->currency->decimal_separator;
        $thousand_separator = $settings->currency->thousand_separator;

        if ($position == 'prefix') {
            $formatted_value = $symbol . number_format((float) $value, 2, $decimal_separator, $thousand_separator);
        } else {
            $formatted_value = number_format((float) $value, 2, $decimal_separator, $thousand_separator) . $symbol;
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
