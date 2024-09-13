<?php

use App\Models\Company\Company;
use App\Models\Module\InstalledModule;
use App\Models\Module\Module;
use Illuminate\Support\Facades\Cache;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Settings\Entities\System\SystemParameter;

if (!function_exists('getModuleHandlerClass')) {
    function getModuleHandlerClass($moduleSlug) {
        // Capitalize the first letter of the slug for the namespace and class name
        $capitalizedSlug = ucfirst($moduleSlug);

        // Build the full class path
        $classPath = "Modules\\{$capitalizedSlug}\\Handlers\\{$capitalizedSlug}AppHandler";

        return $classPath;
    }
}


if (!function_exists('generate_unique_database_secret')) {
    function generate_unique_database_secret() {
        $prefix = 'KOV';
        $allowedChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        do {
            // Create 3 segments with 3 characters each (letters and numbers)
            $segments = [];
            for ($i = 0; $i < 3; $i++) {
                $segments[] = substr(str_shuffle($allowedChars), 0, 3);
            }

            // Join the segments with dashes
            $kovString = $prefix . '-' . implode('-', $segments);

            // Check if the string already exists in the database
        } while (SystemParameter::where('database_secret', $kovString)->exists());

        return $kovString;
    }
}

// Convert two UoM
function convertUnit($amount, $fromUnit, $toUnit) {
    $from = UnitOfMeasure::where('name', $fromUnit)->first();
    $to = UnitOfMeasure::where('name', $toUnit)->first();

    if (!$from || !$to) {
        throw new Exception("One or both of the specified units do not exist.");
    }

    // Ensure both units are from the same category
    if ($from->uom_category_id !== $to->uom_category_id) {
        throw new Exception("Units are not from the same category and cannot be converted.");
    }

    // Determine how to calculate the base amount based on the unit type
    if ($from->type === 'reference') {
        $baseAmount = $amount; // If from unit is reference, amount remains the same
    } else if ($from->type === 'smaller') {
        $baseAmount = $amount / $from->ratio; // Convert smaller to reference
    } else { // if from->type is 'bigger'
        $baseAmount = $amount * $from->ratio; // Convert bigger to reference
    }

    // Convert from reference to the target unit
    if ($to->type === 'reference') {
        $convertedAmount = $baseAmount;
    } else if ($to->type === 'smaller') {
        $convertedAmount = $baseAmount * $to->ratio; // Reference to smaller
    } else { // if to->type is 'bigger'
        $convertedAmount = $baseAmount / $to->ratio; // Reference to bigger
    }

    // Apply rounding precision to the final result
    return round($convertedAmount, $to->rounding_precision);
}