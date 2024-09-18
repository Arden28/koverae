<?php
namespace Modules\App\Handlers;

use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;
use Modules\App\Entities\Languages\Language;
use Modules\Dashboards\Handlers\DashboardsAppHandler;
use Modules\Settings\Entities\Currency;
use Modules\Inventory\Entities\UoM\UnitOfMeasureCategory;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Settings\Handlers\SettingsAppHandler;


class AppManagerHandler extends AppHandler
{
    protected function getModuleSlug()
    {
        return 'apps';
    }

    protected function handleInstallation($company)
    {
        // Example: Create app-manager related data and initial configuration
        $this->installCurrencies($company);
        $this->installUnitsOfMeasure($company);
        $this->installLanguages($company);
    }

    protected function handleUninstallation()
    {
        // Example: Drop blog-related tables and clean up configurations
    }
    

    /**
     * Install multiple modules at once, handling transactions and logging.
     *
     * @param array $modules An array of module handlers to install.
     * @param mixed $company The company context under which modules are being installed.
     * @param mixed $user The user performing the installation.
     */
    public function installModules($company, $user)
    {
        $modules = [
            new AppManagerHandler(),
            new SettingsAppHandler(),
            new DashboardsAppHandler(),
            // Add other module handlers as needed
        ];
        
        // Start transaction to ensure all modules are installed successfully or none at all.
        try {
            foreach ($modules as $module) {
                // Validate prerequisites before installation.
                $module->validatePrerequisites();
                
                // Execute module-specific installation logic.
                $module->handleInstallation($company);
                
                // Load any necessary configuration after installation.
                $module->loadConfiguration();
                
                // Record the installation in the database.
                $module->recordInstallation($company, $user);
            }
            // Commit the transaction if all installations are successful.
            Log::info("Successfully installed modules: " . implode(', ', array_map(function ($m) { return get_class($m); }, $modules)));
        } catch (Exception $e) {
            // Roll back the transaction if any installation fails.
            Log::error("Error installing modules: " . $e->getMessage());
            throw $e;
        }
    }
    
    // Install the Basic data

    
    /**
     * Install currencies for the company.
     *
     * @param int $companyId
     */
    private function installCurrencies(int $companyId): void
    {
        $currencies = [
            // North Africa
            ['currency_name' => 'Algerian Dinar', 'code' => 'DZD', 'symbol' => 'د.ج', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Egyptian Pound', 'code' => 'EGP', 'symbol' => '£', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Libyan Dinar', 'code' => 'LYD', 'symbol' => 'ل.د', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Moroccan Dirham', 'code' => 'MAD', 'symbol' => 'د.م.', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Tunisian Dinar', 'code' => 'TND', 'symbol' => 'د.ت', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            
            // West Africa
            ['currency_name' => 'West African CFA Franc', 'code' => 'XOF', 'symbol' => 'CFA', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Nigerian Naira', 'code' => 'NGN', 'symbol' => '₦', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Ghanaian Cedi', 'code' => 'GHS', 'symbol' => 'GH₵', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // Central Africa
            ['currency_name' => 'Central African CFA Franc', 'code' => 'XAF', 'symbol' => 'FCFA', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Congolese Franc', 'code' => 'CDF', 'symbol' => 'FC', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Rwandan Franc', 'code' => 'RWF', 'symbol' => 'RF', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            
            // East Africa
            ['currency_name' => 'Kenyan Shilling', 'code' => 'KES', 'symbol' => 'KSh', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Ugandan Shilling', 'code' => 'UGX', 'symbol' => 'USh', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Rwandan Franc', 'code' => 'RWF', 'symbol' => 'RF', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            
            // Southern Africa
            ['currency_name' => 'Botswana Pula', 'code' => 'BWP', 'symbol' => 'P', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'South African Rand', 'code' => 'ZAR', 'symbol' => 'R', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Namibian Dollar', 'code' => 'NAD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // Eurozone - Use Euro
            ['currency_name' => 'Euro', 'code' => 'EUR', 'symbol' => '€', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            
            // Northern Europe
            ['currency_name' => 'Danish Krone', 'code' => 'DKK', 'symbol' => 'kr.', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Norwegian Krone', 'code' => 'NOK', 'symbol' => 'kr', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Swedish Krona', 'code' => 'SEK', 'symbol' => 'kr', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'British Pound Sterling', 'code' => 'GBP', 'symbol' => '£', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // Eastern Europe
            ['currency_name' => 'Polish Zloty', 'code' => 'PLN', 'symbol' => 'zł', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Hungarian Forint', 'code' => 'HUF', 'symbol' => 'Ft', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Romanian Leu', 'code' => 'RON', 'symbol' => 'lei', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Bulgarian Lev', 'code' => 'BGN', 'symbol' => 'лв.', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Russian Ruble', 'code' => 'RUB', 'symbol' => '₽', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            
            // Southern Europe
            ['currency_name' => 'Turkish Lira', 'code' => 'TRY', 'symbol' => '₺', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Swiss Franc', 'code' => 'CHF', 'symbol' => 'CHF', 'thousand_separator' => '\'', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // Western Europe (outside Eurozone)
            ['currency_name' => 'Icelandic Krona', 'code' => 'ISK', 'symbol' => 'kr', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['currency_name' => 'Croatian Kuna', 'code' => 'HRK', 'symbol' => 'kn', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            
            // Far East
            ['currency_name' => 'Japanese Yen', 'code' => 'JPY', 'symbol' => '¥', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'South Korean Won', 'code' => 'KRW', 'symbol' => '₩', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Chinese Yuan', 'code' => 'CNY', 'symbol' => '¥', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Hong Kong Dollar', 'code' => 'HKD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Taiwan Dollar', 'code' => 'TWD', 'symbol' => 'NT$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // Southeast Asia
            ['currency_name' => 'Thai Baht', 'code' => 'THB', 'symbol' => '฿', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Singapore Dollar', 'code' => 'SGD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Malaysian Ringgit', 'code' => 'MYR', 'symbol' => 'RM', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Indonesian Rupiah', 'code' => 'IDR', 'symbol' => 'Rp', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Philippine Peso', 'code' => 'PHP', 'symbol' => '₱', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // South Asia
            ['currency_name' => 'Indian Rupee', 'code' => 'INR', 'symbol' => '₹', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Pakistani Rupee', 'code' => 'PKR', 'symbol' => '₨', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Bangladeshi Taka', 'code' => 'BDT', 'symbol' => '৳', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Sri Lankan Rupee', 'code' => 'LKR', 'symbol' => 'Rs', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Afghan Afghani', 'code' => 'AFN', 'symbol' => '؋', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // North America
            ['currency_name' => 'US Dollar', 'code' => 'USD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Canadian Dollar', 'code' => 'CAD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Mexican Peso', 'code' => 'MXN', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // Central America
            ['currency_name' => 'Guatemalan Quetzal', 'code' => 'GTQ', 'symbol' => 'Q', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Honduran Lempira', 'code' => 'HNL', 'symbol' => 'L', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Nicaraguan Cordoba', 'code' => 'NIO', 'symbol' => 'C$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Panamanian Balboa', 'code' => 'PAB', 'symbol' => 'B/.', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Belize Dollar', 'code' => 'BZD', 'symbol' => 'BZ$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            
            // South America
            ['currency_name' => 'Brazilian Real', 'code' => 'BRL', 'symbol' => 'R$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Argentine Peso', 'code' => 'ARS', 'symbol' => '$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Colombian Peso', 'code' => 'COP', 'symbol' => '$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Peruvian Sol', 'code' => 'PEN', 'symbol' => 'S/.', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Venezuelan Bolivar', 'code' => 'VES', 'symbol' => 'Bs.', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Uruguayan Peso', 'code' => 'UYU', 'symbol' => '$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Chilean Peso', 'code' => 'CLP', 'symbol' => '$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            
            // Caribbean
            ['currency_name' => 'East Caribbean Dollar', 'code' => 'XCD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Haitian Gourde', 'code' => 'HTG', 'symbol' => 'G', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['currency_name' => 'Jamaican Dollar', 'code' => 'JMD', 'symbol' => 'J$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix']
        ];

        foreach ($currencies as $currency) {
            Currency::create(array_merge(['company_id' => $companyId], $currency));
        }
    }

    /**
     * Install units of measure for the company.
     *
     * @param int $companyId
     */
    private function installUnitsOfMeasure(int $companyId): void
    {
        $categoriesWithUnits = [
            'Unit' => [
                ['name' => 'Units', 'type' => 'reference', 'ratio' => 1, 'rounding_precision' => 0.01000],
                ['name' => 'Dozens', 'type' => 'bigger', 'ratio' => 12.00000, 'rounding_precision' => 0.01000],
            ],
            'Weight' => [
                ['name' => 'g', 'type' => 'smaller', 'ratio' => 1,000.00000, 'rounding_precision' => 0.01000],
                ['name' => 'oz', 'type' => 'smaller', 'ratio' => 35.27400, 'rounding_precision' => 0.01000],
                ['name' => 'ib', 'type' => 'smaller', 'ratio' => 2.20462, 'rounding_precision' => 0.01000],
                ['name' => 'kg', 'type' => 'reference', 'ratio' => 1.00, 'rounding_precision' => 0.01000],
                ['name' => 't', 'type' => 'bigger', 'ratio' => 1000,00000, 'rounding_precision' => 0.01000],
            ],
            'Working Time' => [
                ['name' => 'Hours', 'type' => 'smaller', 'ratio' => 8.00000, 'rounding_precision' => 0.01000],
                ['name' => 'Days', 'type' => 'reference', 'ratio' => 1.00000, 'rounding_precision' => 0.01000],
            ],
            'Length/Distance' => [
                ['name' => 'mm', 'type' => 'smaller', 'ratio' => 1,000.00000, 'rounding_precision' => 0.01000],
                ['name' => 'in', 'type' => 'smaller', 'ratio' => 39.37010, 'rounding_precision' => 0.01000],
                ['name' => 'ft', 'type' => 'smaller', 'ratio' => 3.28084, 'rounding_precision' => 0.01000],
                ['name' => 'yd', 'type' => 'smaller', 'ratio' => 1.09361, 'rounding_precision' => 0.01000],
                ['name' => 'cm', 'type' => 'smaller', 'ratio' => 100.00000, 'rounding_precision' => 0.01000],
                ['name' => 'm', 'type' => 'reference', 'ratio' => 1.0, 'rounding_precision' => 0.01000],
                ['name' => 'km', 'type' => 'bigger', 'ratio' => 1,000.00000, 'rounding_precision' => 0.01000],
                ['name' => 'mi', 'type' => 'bigger', 'ratio' => 1,609.34000, 'rounding_precision' => 0.01000],
            ],
            'Area' => [
                ['name' => 'm²', 'type' => 'reference', 'ratio' => 1.00000, 'rounding_precision' => 0.01000],
                ['name' => 'ft²', 'type' => 'smaller', 'ratio' => 10.76391, 'rounding_precision' => 0.01000],
            ],
            'Volume' => [
                ['name' => 'in³', 'type' => 'smaller', 'ratio' => 61.02370, 'rounding_precision' => 0.01000],
                ['name' => 'fl oz (US)', 'type' => 'smaller', 'ratio' => 33.81400, 'rounding_precision' => 0.01000],
                ['name' => 'qt (US)', 'type' => 'smaller', 'ratio' => 1.05669, 'rounding_precision' => 0.01000],
                ['name' => 'L', 'type' => 'reference', 'ratio' => 1.00000, 'rounding_precision' => 0.01000],
                ['name' => 'gal (US)', 'type' => 'bigger', 'ratio' => 3.78541, 'rounding_precision' => 0.01000],
                ['name' => 'ft³', 'type' => 'bigger', 'ratio' => 28.31680, 'rounding_precision' => 0.01000],
                ['name' => 'm³', 'type' => 'bigger', 'ratio' => 1,000.00000, 'rounding_precision' => 0.01000],
            ],
            // Define other categories similarly
        ];
    
        foreach ($categoriesWithUnits as $categoryName => $units) {
            $category = UnitOfMeasureCategory::create([
                'company_id' => $companyId,
                'name' => $categoryName,
            ]);
    
            foreach ($units as $unit) {
                UnitOfMeasure::create([
                    'company_id' => $companyId,
                    'uom_category_id' => $category->id,
                    'name' => $unit['name'],
                    'type' => $unit['type'],
                    'ratio' => $unit['ratio'],
                    'rounding_precision' => $unit['rounding_precision'],
                ]);
            }
        }

    }

    /**
     * Install units of measure for the company.
     *
     * @param int $companyId
     */
    public function installLanguages(int $companyId) : void
    {
        $languages = [
            ['name' => 'English (US)', 'icon' => 'us', 'locale_code' => 'en_US', 'iso_code' => 'en', 'url_code' => 'en', 'direction' => 'left_to_right', 'separator_format' => '[3,0]', 'decimal_separator' => '.', 'thousand_separator' => ',', 'first_day' => 'sunday', 'is_active' => true, 'is_reference' => true],
            ['name' => 'French / Français', 'icon' => 'fr', 'locale_code' => 'fr_FR', 'iso_code' => 'fr', 'url_code' => 'fr', 'direction' => 'left_to_right', 'separator_format' => '[3,0]', 'decimal_separator' => ',', 'thousand_separator' => '.', 'first_day' => 'monday', 'is_active' => false],
            ['name' => 'Swahili / Kiswahili', 'icon' => '', 'locale_code' => 'sw', 'iso_code' => 'sw', 'url_code' => 'sw', 'direction' => 'left_to_right', 'separator_format' => '[3,0]', 'decimal_separator' => '.', 'thousand_separator' => ',', 'first_day' => 'monday', 'is_active' => false],
            ['name' => 'Hindi / हिंदी', 'icon' => '', 'locale_code' => 'hi_IN', 'iso_code' => 'hi', 'url_code' => 'hi', 'direction' => 'left_to_right', 'separator_format' => '[]', 'decimal_separator' => '.', 'thousand_separator' => ',', 'first_day' => 'sunday', 'is_active' => false],
            ['name' => 'Arabic / الْعَرَبيّة', 'icon' => 'sa', 'locale_code' => 'ar_AR', 'iso_code' => 'ar', 'url_code' => 'ar', 'direction' => 'right_to_left', 'separator_format' => '[3,0]', 'decimal_separator' => '.', 'thousand_separator' => ',', 'first_day' => 'saturday', 'is_active' => false],
            ['name' => 'Japanese / 日本語', 'icon' => 'jp', 'locale_code' => 'ja_JP', 'iso_code' => 'ja', 'url_code' => 'ja', 'direction' => 'left_to_right', 'separator_format' => '[3,0]', 'decimal_separator' => '.', 'thousand_separator' => ',', 'first_day' => 'sunday', 'is_active' => false],
            ['name' => 'Russian / русский язык', 'icon' => 'ru', 'locale_code' => 'ru_RU', 'iso_code' => 'ru', 'url_code' => 'ru', 'direction' => 'left_to_right', 'separator_format' => '[3,0]', 'decimal_separator' => ',', 'thousand_separator' => '', 'first_day' => 'monday', 'is_active' => false],
            // Add other languages similarly
        ];

        foreach ($languages as $language) {
            Language::create(array_merge(['company_id' => $companyId], $language));
        }

    }

}
