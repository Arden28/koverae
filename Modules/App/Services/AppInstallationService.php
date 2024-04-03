<?php

namespace Modules\App\Services;

use App\Models\Company\Company;
use App\Models\Module\InstalledModule as ModuleInstalledModule;
use App\Models\Module\Module;
use App\Models\User;
use Modules\App\Entities\Email\EmailTemplate;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Entities\HonorificTitle;
use Modules\Contact\Entities\Industrie;
use Modules\Dashboards\Entities\AppDashboard;
use Modules\Dashboards\Entities\Dashboard;
use Modules\Dashboards\Entities\InstalledDashboard;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\JobType;
use Modules\Employee\Entities\Workplace;
use Modules\Employee\Entities\WorkSchedule;
use Modules\Inventory\Entities\Category;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Inventory\Entities\UoM\UnitOfMeasureCategory;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;
use Modules\Inventory\Entities\Warehouse\Warehouse;
use Modules\Inventory\Entities\Warehouse\WarehouseRoute;
use Modules\Inventory\Entities\Warehouse\WarehouseRouteRule;
use Modules\Invoicing\Entities\Tax\Tax;
use Modules\Sales\Entities\Price\PriceList;
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeam;
use Modules\Settings\Entities\Currency;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Entities\System\SystemParameter;

class AppInstallationService
{
    public function installModule(string $moduleSlug, int $companyId)
    {
        $m = Module::where('slug', $moduleSlug)->first();

        if($m->parent_slug){
            $parent = ModuleInstalledModule::create([
                'company_id' => $companyId,
                'module_slug' => $m->parent_slug,
            ]);

            $parent->save();
        }

        $module = ModuleInstalledModule::create([
            'company_id' => $companyId,
            'module_slug' => $moduleSlug,
        ]);

        $module->save();
        // Load the app installation process
        if($moduleSlug == 'employee'){
            $this->installEmployee($companyId);
        }elseif($moduleSlug == 'sales'){
            $this->installSales($companyId);
        }elseif($moduleSlug == 'inventory'){
            $this->installInventory($companyId);
        }elseif($moduleSlug == 'purchase'){
            $this->installPurchase($companyId);
        }elseif($moduleSlug == 'contact'){
            $this->installContact($companyId);
        }

        // Here you can add additional installation logic specific to the module
        // For example, running module-specific seeders, creating default settings, etc.

        return $module;
    }

    // Install the basic App: Apps, Tableaux de bord, Paramètres, ToDo, Calendrier
    public function installBasicApp($company){

        $apps = [
            [
                'company_id' => $company,
                'module_slug' => 'apps',
            ],
            [
                'company_id' => $company,
                'module_slug' => 'settings',
            ],
            [
                'company_id' => $company,
                'module_slug' => 'dashboards',
            ],
            [
                'company_id' => $company,
                'module_slug' => 'task',
            ],
            [
                'company_id' => $company,
                'module_slug' => 'contact',
            ],
        ];

        foreach($apps as $app){
            $this->installModule($app['module_slug'], $company);
        }
        // Install Dashboards
        $this->createDashboards($company);

    }

    // Install Basic Data
    public function installBasicAppData($company){

        $comp = Company::find($company);
        // Devises
        $currencies = [
            // Afrique du Nord
            ['company_id' => $company, 'currency_name' => 'Dinar Algérien', 'code' => 'DZD', 'symbol' => 'د.ج', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Livre Égyptienne', 'code' => 'EGP', 'symbol' => '£', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Dinar Libyen', 'code' => 'LYD', 'symbol' => 'ل.د', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Dirham Marocain', 'code' => 'MAD', 'symbol' => 'د.م.', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Dinar Tunisien', 'code' => 'TND', 'symbol' => 'د.ت', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],

            // Afrique de l'Ouest
            ['company_id' => $company, 'currency_name' => 'Franc CFA d’Afrique de l’Ouest', 'code' => 'XOF', 'symbol' => 'CFA', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Naira Nigérian', 'code' => 'NGN', 'symbol' => '₦', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Cedi Ghanéen', 'code' => 'GHS', 'symbol' => 'GH₵', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Afrique Centrale
            ['company_id' => $company, 'currency_name' => 'Franc CFA d’Afrique Centrale', 'code' => 'XAF', 'symbol' => 'FCFA', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Franc Congolais', 'code' => 'CDF', 'symbol' => 'FC', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Franc Rwandais', 'code' => 'RWF', 'symbol' => 'RF', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],

            // Afrique de l'Est
            ['company_id' => $company, 'currency_name' => 'Shilling Kenyan', 'code' => 'KES', 'symbol' => 'KSh', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Shilling Ougandais', 'code' => 'UGX', 'symbol' => 'USh', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Franc Rwandais', 'code' => 'RWF', 'symbol' => 'RF', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],

            // Afrique Australe
            ['company_id' => $company, 'currency_name' => 'Pula Botswanais', 'code' => 'BWP', 'symbol' => 'P', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Rand Sud-Africain', 'code' => 'ZAR', 'symbol' => 'R', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Dollar Namibien', 'code' => 'NAD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Zone Euro - Utilisent l'Euro
            ['company_id' => $company, 'currency_name' => 'Euro', 'code' => 'EUR', 'symbol' => '€', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],

            // Europe du Nord
            ['company_id' => $company, 'currency_name' => 'Couronne Danoise', 'code' => 'DKK', 'symbol' => 'kr.', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Couronne Norvégienne', 'code' => 'NOK', 'symbol' => 'kr', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Couronne Suédoise', 'code' => 'SEK', 'symbol' => 'kr', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Livre Sterling', 'code' => 'GBP', 'symbol' => '£', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Europe de l'Est
            ['company_id' => $company, 'currency_name' => 'Zloty Polonais', 'code' => 'PLN', 'symbol' => 'zł', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Forint Hongrois', 'code' => 'HUF', 'symbol' => 'Ft', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Leu Roumain', 'code' => 'RON', 'symbol' => 'lei', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Lev Bulgare', 'code' => 'BGN', 'symbol' => 'лв.', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Rouble Russe', 'code' => 'RUB', 'symbol' => '₽', 'thousand_separator' => ' ', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],

            // Europe du Sud
            ['company_id' => $company, 'currency_name' => 'Lira Turque', 'code' => 'TRY', 'symbol' => '₺', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Franc Suisse', 'code' => 'CHF', 'symbol' => 'CHF', 'thousand_separator' => '\'', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Europe de l'Ouest (hors zone euro)
            ['company_id' => $company, 'currency_name' => 'Couronne Islandaise', 'code' => 'ISK', 'symbol' => 'kr', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],
            ['company_id' => $company, 'currency_name' => 'Kuna Croate', 'code' => 'HRK', 'symbol' => 'kn', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'suffix'],

            // Extrême-Orient
            ['company_id' => $company, 'currency_name' => 'Yen Japonais', 'code' => 'JPY', 'symbol' => '¥', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Won Sud-Coréen', 'code' => 'KRW', 'symbol' => '₩', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Yuan Chinois', 'code' => 'CNY', 'symbol' => '¥', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Dollar de Hong Kong', 'code' => 'HKD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Dollar Taïwanais', 'code' => 'TWD', 'symbol' => 'NT$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Asie du Sud-Est
            ['company_id' => $company, 'currency_name' => 'Baht Thaïlandais', 'code' => 'THB', 'symbol' => '฿', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Dollar Singapourien', 'code' => 'SGD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Ringgit Malaisien', 'code' => 'MYR', 'symbol' => 'RM', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Roupie Indonésienne', 'code' => 'IDR', 'symbol' => 'Rp', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Peso Philippin', 'code' => 'PHP', 'symbol' => '₱', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Asie du Sud
            ['company_id' => $company, 'currency_name' => 'Roupie Indienne', 'code' => 'INR', 'symbol' => '₹', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Roupie Pakistanaise', 'code' => 'PKR', 'symbol' => '₨', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Taka Bangladais', 'code' => 'BDT', 'symbol' => '৳', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Roupie Sri Lankaise', 'code' => 'LKR', 'symbol' => 'Rs', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Afghani Afghan', 'code' => 'AFN', 'symbol' => '؋', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Amérique du Nord
            ['company_id' => $company, 'currency_name' => 'Dollar Américain', 'code' => 'USD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Dollar Canadien', 'code' => 'CAD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Peso Mexicain', 'code' => 'MXN', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Amérique Centrale
            ['company_id' => $company, 'currency_name' => 'Quetzal Guatémaltèque', 'code' => 'GTQ', 'symbol' => 'Q', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Lempira Hondurien', 'code' => 'HNL', 'symbol' => 'L', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Córdoba Nicaraguayen', 'code' => 'NIO', 'symbol' => 'C$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Balboa Panaméen', 'code' => 'PAB', 'symbol' => 'B/.', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Dollar de Belize', 'code' => 'BZD', 'symbol' => 'BZ$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],

            // Amérique du Sud
            ['company_id' => $company, 'currency_name' => 'Real Brésilien', 'code' => 'BRL', 'symbol' => 'R$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Peso Argentin', 'code' => 'ARS', 'symbol' => '$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Peso Colombien', 'code' => 'COP', 'symbol' => '$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Sol Péruvien', 'code' => 'PEN', 'symbol' => 'S/.', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Bolívar Vénézuélien', 'code' => 'VES', 'symbol' => 'Bs.', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Peso Uruguayen', 'code' => 'UYU', 'symbol' => '$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Peso Chilien', 'code' => 'CLP', 'symbol' => '$', 'thousand_separator' => '.', 'decimal_separator' => ',', 'symbol_position' => 'prefix'],

            // Caraïbes
            ['company_id' => $company, 'currency_name' => 'Dollar des Caraïbes Orientales', 'code' => 'XCD', 'symbol' => '$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Gourde Haïtienne', 'code' => 'HTG', 'symbol' => 'G', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix'],
            ['company_id' => $company, 'currency_name' => 'Dollar Jamaïcain', 'code' => 'JMD', 'symbol' => 'J$', 'thousand_separator' => ',', 'decimal_separator' => '.', 'symbol_position' => 'prefix']

        ];
        foreach($currencies as $currency){
            Currency::create($currency);
        }

        // Pays

        // Paramètres de l'entreprise
        $system_parameter = SystemParameter::create([
            'company_id' => $company,
            'database_create_date' => now(),
            'database_expiration_date' => now()->addDays(8),
        ]);
        $system_parameter->save();

        $default_currency = Currency::where('code', $comp->default_currency)->first();
        $settings = Setting::create([
            'company_id' => $company,
            'default_currency_id' => $default_currency->id,
            'default_currency_position' => $default_currency->symbol_position
        ]);
        $settings->save();

        // Taxes
        $taxes = [
            [
                'company_id' => $company,
                'name' => "18.9%",
                'type' => "sales",
                'scope_tax' => 'goods',
                'calculation_type' => 'percentage',
                'amount' => 18.90,
            ],
            [
                'company_id' => $company,
                'name' => "18.9%",
                'type' => "purchases",
                'scope_tax' => 'goods',
                'calculation_type' => 'percentage',
                'amount' => 18.90,
            ],
        ];
        foreach($taxes as $tax){
            Tax::create($tax);
        }
        $sales_tax = Tax::isCompany($company)->isType('sales')->first();
        $purchase_tax = Tax::isCompany($company)->isType('purchases')->first();

        // Définir les taxes par défaut
        $settings->default_sales_tax_id = $sales_tax->id;
        $settings->default_purchase_tax_id = $purchase_tax->id;
        $settings->save();

        // Unités de mesures
        $uom_cat_1 = UnitOfMeasureCategory::create([
            'company_id' => $company,
            'name' => 'Unité'
        ]);
        $uom_cat_1->save();

        $uom_cat_2 = UnitOfMeasureCategory::create([
            'company_id' => $company,
            'name' => 'Poids'
        ]);
        $uom_cat_2->save();

        $uom_cat_3 = UnitOfMeasureCategory::create([
            'company_id' => $company,
            'name' => 'Temps de travail'
        ]);
        $uom_cat_3->save();

        $uom_cat_4 = UnitOfMeasureCategory::create([
            'company_id' => $company,
            'name' => 'Longueur / Distance'
        ]);
        $uom_cat_4->save();

        $uom_cat_5 = UnitOfMeasureCategory::create([
            'company_id' => $company,
            'name' => 'Superficie'
        ]);
        $uom_cat_5->save();

        $uom_cat_6 = UnitOfMeasureCategory::create([
            'company_id' => $company,
            'name' => 'Volume'
        ]);
        $uom_cat_6->save();

        $uoms = [
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_1->id,
                'name' => 'Unité(s)',
                'type' => 'reference',
                'ratio' => 0.01
            ],
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_1->id,
                'name' => 'Douzaine(s)',
                'type' => 'bigger',
                'ratio' => 1
            ],
            // Poids
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_2->id,
                'name' => 'g',
                'type' => 'smaller',
                'ratio' => 1000
            ],
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_2->id,
                'name' => 'kg',
                'type' => 'reference',
                'ratio' => 1
            ],
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_2->id,
                'name' => 't',
                'type' => 'bigger',
                'ratio' => 1000.00
            ],
            // Temps de travail
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_3->id,
                'name' => 'Heure(s)',
                'type' => 'reference',
                'ratio' => 8
            ],
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_3->id,
                'name' => 'Heure(s)',
                'type' => 'reference',
                'ratio' => 1
            ],
            // Longueur
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_4->id,
                'name' => 'cm',
                'type' => 'smaller',
                'ratio' => 100.00
            ],
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_4->id,
                'name' => 'm',
                'type' => 'reference',
                'ratio' => 1
            ],
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_4->id,
                'name' => 'km',
                'type' => 'bigger',
                'ratio' => 1000
            ],
            //Superficie
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_5->id,
                'name' => 'm²',
                'type' => 'reference',
                'ratio' => 1
            ],
            //Volume
            [
                'company_id' => $company,
                'uom_category_id' => $uom_cat_5->id,
                'name' => 'm³',
                'type' => 'reference',
                'ratio' => 1
            ],
        ];
        foreach($uoms as $uom){
            UnitOfMeasure::create($uom);
        }

        //Catégorie de produits

        $cat_1 = Category::create([
            'company_id' => $company,
            'category_name' => 'Tout',
        ]);
        $cat_1->save();

        $categories = [
            // Expense
            [
                'company_id' => $company,
                'parent_id' => $cat_1->id,
                'category_name' => 'Dépenses',
            ],
            // Saleable
            [
                'company_id' => $company,
                'parent_id' => $cat_1->id,
                'category_name' => 'Vendable',
            ],
        ];
        foreach($categories as $category){
            Category::create($category);
        }
    }

    // Install Contact
    public function installContact($company){

        // Civilité
        $titles = [
            [
                'company_id' => $company,
                'title' => 'Monsieur',
                'abbreviation' => 'Mr',
            ],
            [
                'company_id' => $company,
                'title' => 'Madame',
                'abbreviation' => 'Mme',
            ],
            [
                'company_id' => $company,
                'title' => 'Mademoiselle',
                'abbreviation' => 'Mlle',
            ],
            [
                'company_id' => $company,
                'title' => 'Docteur',
                'abbreviation' => 'Dr',
            ],
            [
                'company_id' => $company,
                'title' => 'Professeur',
                'abbreviation' => 'Pr',
            ],
        ];
        foreach($titles as $title){
            HonorificTitle::create($title);
        }

        // Secteurs d'activité
        $industries = [
            [
                'company_id' => $company,
                'name' => 'Agriculture ',
                'full_name' => "Secteur de l'Agriculture et de l'Agroalimentaire",
            ],
            [
                'company_id' => $company,
                'name' => 'Mines',
                'full_name' => 'Industrie Minière et Extraction de Minéraux',
            ],
            [
                'company_id' => $company,
                'name' => 'Énergie',
                'full_name' => "Secteur de l'Énergie et des Ressources Naturelles",
            ],
            [
                'company_id' => $company,
                'name' => 'Finance',
                'full_name' => 'Services Financiers et Bancaires',
            ],
            [
                'company_id' => $company,
                'name' => 'Télécommunications',
                'full_name' => 'Industrie des Télécommunications et des Réseaux',
            ],
            [
                'company_id' => $company,
                'name' => 'Transport',
                'full_name' => 'Transport et Logistique',
            ],
            [
                'company_id' => $company,
                'name' => 'Logistique',
                'full_name' => "Gestion de la Logistique et de la Chaîne d'Approvisionnement",
            ],
            [
                'company_id' => $company,
                'name' => 'Construction',
                'full_name' => 'Secteur de la Construction et du Génie Civil',
            ],
            [
                'company_id' => $company,
                'name' => 'Immobilier',
                'full_name' => 'Marché Immobilier et Gestion de Propriétés',
            ],
            [
                'company_id' => $company,
                'name' => 'Tourisme',
                'full_name' => "Industrie du Tourisme et de l'Hospitalité",
            ],
            [
                'company_id' => $company,
                'name' => 'Éducation',
                'full_name' => 'Système Éducatif et Formation',
            ],
            [
                'company_id' => $company,
                'name' => 'Santé',
                'full_name' => "Services de Santé et Médicaux",
            ],
            [
                'company_id' => $company,
                'name' => 'Commerce',
                'full_name' => 'Commerce de Détail et de Gros',
            ],
            [
                'company_id' => $company,
                'name' => 'Industrie',
                'full_name' => 'Secteur Manufacturier et Industriel',
            ],
            [
                'company_id' => $company,
                'name' => 'Technologie',
                'full_name' => "Technologie de l'Information et de la Communication (TIC)",
            ],
            [
                'company_id' => $company,
                'name' => 'Eau et Assainissement',
                'full_name' => "Gestion des Ressources en Eau et Services d'Assainissement",
            ],
            [
                'company_id' => $company,
                'name' => 'Énergies renouvelables',
                'full_name' => "Production d'Énergies Renouvelables et Durables",
            ],
            [
                'company_id' => $company,
                'name' => 'Forêts',
                'full_name' => 'Gestion Forestière et Exploitation Durable des Forêts',
            ],
            [
                'company_id' => $company,
                'name' => 'Pêche',
                'full_name' => 'Industrie de la Pêche et Aquaculture',
            ],
            [
                'company_id' => $company,
                'name' => 'Agroalimentaire',
                'full_name' => 'Industrie Agroalimentaire et Transformation Alimentaire',
            ],
            [
                'company_id' => $company,
                'name' => 'Services professionnels',
                'full_name' => 'Services Professionnels, Scientifiques et Techniques',
            ],
            [
                'company_id' => $company,
                'name' => 'Environnement',
                'full_name' => "Protection de l'Environnement et Gestion Durable des Ressources",
            ],
            [
                'company_id' => $company,
                'name' => 'Médias',
                'full_name' => "Secteur des Médias, de l'Information et de la Communication",
            ],
            [
                'company_id' => $company,
                'name' => 'Culture',
                'full_name' => 'Secteur Culturel et Artistique',
            ],
            [
                'company_id' => $company,
                'name' => 'Artisanat',
                'full_name' => "Artisanat et Production de Biens Culturels",
            ],
            [
                'company_id' => $company,
                'name' => 'E-commerce',
                'full_name' => 'Commerce Électronique et Vente en Ligne',
            ],
            [
                'company_id' => $company,
                'name' => 'Services financiers mobiles',
                'full_name' => 'Services Financiers Mobiles et Banque Digitale',
            ],
            [
                'company_id' => $company,
                'name' => 'Énergie solaire',
                'full_name' => "Industrie de l'Énergie Solaire et Solutions Photovoltaïques",
            ],
            [
                'company_id' => $company,
                'name' => 'Aquaculture',
                'full_name' => "Secteur de l'Aquaculture et de la Production Aquatique",
            ],
            [
                'company_id' => $company,
                'name' => 'Biotechnologie',
                'full_name' => 'Secteur de la Biotechnologie et Recherche Scientifique',
            ],
            [
                'company_id' => $company,
                'name' => 'Sécurité',
                'full_name' => 'Services de Sécurité et Protection',
            ],
            [
                'company_id' => $company,
                'name' => 'Gestion des déchets',
                'full_name' => 'Gestion et Recyclage des Déchets',
            ],
            [
                'company_id' => $company,
                'name' => 'Microfinance',
                'full_name' => 'Services de Microfinance et Soutien aux Petites Entreprises',
            ],
            [
                'company_id' => $company,
                'name' => 'Transformation agricole',
                'full_name' => 'Industrie de Transformation Agricole et Valorisation des Produits Locaux',
            ],
            [
                'company_id' => $company,
                'name' => 'Industrie pharmaceutique',
                'full_name' => "Production et Distribution de Produits Pharmaceutiques",
            ],
            [
                'company_id' => $company,
                'name' => 'Fintech',
                'full_name' => 'Technologies Financières et Innovation dans les Services Financiers',
            ],
        ];
        foreach($industries as $industry){
            Industrie::create($industry);
        }

        $comp = Company::find($company);
        $user = $comp->users()->first();
        //Contacts
        $contacts = [
            [
                'company_id' => $company,
                'user_id' => null,
                'name' => $comp->name,
                'street' => $comp->address,
                'city' => $comp->city,
                'phone' => $comp->phone,
                'mobile' => null,
                'email' => $comp->email,
                'website' => $comp->domain_name.'.koverae.com',
                'reference' => $comp->name,
                'type' => 'company',
            ],
            [
                'company_id' => $company,
                'user_id' => $user->id,
                'name' => $user->name,
                'street' => $comp->address,
                'city' => $comp->city,
                'phone' => $user->phone,
                'mobile' => null,
                'email' => $user->email,
                'website' => null,
                'reference' => $user->name,
                'type' => 'individual',
            ],
        ];
        foreach($contacts as $contact){
            Contact::create($contact);
        }

    }

    // Install Employee
    public function installEmployee($company){
        $comp = Company::find($company);

        // Departments
        $department = Department::create([
            'company_id' => $company,
            'name' => 'Administration',
        ]);

        // Employees
        $users = User::isCompany($comp->id)->get();
        foreach($users as $employee){
            $employee = Employee::create([
                'company_id' => $comp->id,
                'user_id' => $employee->id,
                'department_id' => $department->id
            ]);
            $employee->save();
        }

        $department->save();
        //Job Type
        $jobTypes = [
            [
                'company_id' => $company,
                'title' => 'Permanent'
            ],
            [
                'company_id' => $company,
                'title' => 'Temporaire'
            ],
            [
                'company_id' => $company,
                'title' => 'Saisonnier'
            ],
            [
                'company_id' => $company,
                'title' => 'Temps partiel'
            ],
            [
                'company_id' => $company,
                'title' => 'Temps plein'
            ],
            [
                'company_id' => $company,
                'title' => 'Stage'
            ],
        ];

        foreach($jobTypes as $job){
            JobType::create($job);
        }
        // Workplace
        $worplaces = [
            [
                'company_id' => $company,
                'title' => 'A distance'
            ],
            [
                'company_id' => $company,
                'title' => 'Sur sites'
            ],
            [
                'company_id' => $company,
                'title' => 'Autres'
            ],
        ];
        foreach($worplaces as $worplace){
            Workplace::create($worplace);
        }
        //Work Schedule
        $schedule = WorkSchedule::create([
            'company_id' => $company,
            'name' => 'Norme 40 heures/semaine',
            'average_hour_per_day' => 7,
            'timezone' => 'UTC'
        ]);
        $schedule->save();
    }

    // Install Sales
    public function installSales($company){

        $slugy = 'sales';
        // Tableaux de bords
        $dashboards = [
            [
                'company_id' => $company,
                'slug' => 'sales_dashboard',
            ],
            [
                'company_id' => $company,
                'slug' => 'products_dashboard',
            ],
        ];
        foreach($dashboards as $dashboard){
            $this->installDashboard($dashboard['slug'], $company);
        }

        // Equipes Commerciale
        $salesTeam = SalesTeam::create([
            'company_id' => $company,
            'name' => 'Ventes',
        ]);
        $salesTeam->save();

        $comp = Company::find($company);
        $user = $comp->users()->first();

        // Commercial
        $seller = SalesPerson::create([
            'company_id' => $company,
            'user_id' => $user->id,
            'sales_team_id' => $salesTeam->id
        ]);
        $seller->save();

        // Liste de prix
        $pricelist = PriceList::create([
            'company_id' => $company,
            'name' => 'Liste de prix XAF par défaut',
        ]);
        $pricelist->save();

        // Modèles d'emails
        $emails = [
            [
                'company_id' => $company,
                'apply_to' => 'quotation',
                'name' => 'Ventes: Envoyer le devis',
                'model_class' => 'bon de commande',
                'subject' => '{company_name} Commande Ref ({reference})',
                'content' => "Bonjour,
                            <br>
                            Votre facture pro forma pour le devis {reference} d'un montant de <b>{total_amount}</b> est disponible.
                            <br>
                            <br>
                            N'hésitez pas à nous contacter si vous avez des questions concernant ce devis.
                            <br>
                            <br>
                            Merci pour votre confiance.
                            <br>
                            <br>
                            --
                            {sender}",
                'sender_email' => $user->email,

            ],
            [
                'company_id' => $company,
                'apply_to' => 'sale_order',
                'name' => 'Ventes: Confirmation de commande',
                'model_class' => 'bon de commande',
                'subject' => '{company_name} Commande Ref ({reference})',
                'content' => "Bonjour,
                            <br>
                            Votre commande {reference} d'un montant de <b>{total_amount}</b> a été confirmée.
                            <br>
                            <br>
                            Merci de votre confiance !
                            N'hésitez pas à nous contacter si vous avez des questions.
                            <br>
                            <br>
                            --
                            {sender}",
                'sender_email' => $user->email,

            ],
        ];
        foreach($emails as $email){
            EmailTemplate::create($email);
        }

    }

    // Inventaire
    public function installInventory($company){

        $comp = Company::find($company);

        // Tableaux de bords
        $dashboards = [
            [
                'company_id' => $company,
                'slug' => 'inventory_dashboard',
            ],
            [
                'company_id' => $company,
                'slug' => 'stock_flow_dashboard',
            ],
        ];
        foreach($dashboards as $dashboard){
            $this->installDashboard($dashboard['slug'], $company);
        }

        // Warehouse
        $warehouse = Warehouse::create([
            'company_id' => $company,
            'name' => str()->slug($comp->name),
            'short_name' => 'WH',
            'address' => $comp->address
        ]);
        $warehouse->save();

        // Warehouse Locations
        $location_1 = WarehouseLocation::create([
            'company_id' => $company,
            'warehouse_id' => $warehouse->id,
            'name' => 'Emplacements Physiques',
            'type' => 'view'
        ]);
        $location_1->save();

        $location_2 = WarehouseLocation::create([
            'company_id' => $company,
            'parent_id' => $location_1->id,
            'warehouse_id' => $warehouse->id,
            'name' => 'WH',
            'type' => 'view'
        ]);
        $location_2->save();

        $location_3 = WarehouseLocation::create([
            'company_id' => $company,
            'warehouse_id' => $warehouse->id,
            'name' => 'Partenaires',
            'type' => 'view'
        ]);
        $location_3->save();

        $location_4 = WarehouseLocation::create([
            'company_id' => $company,
            'warehouse_id' => $warehouse->id,
            'name' => 'Emplacements Virtuels',
            'type' => 'view'
        ]);
        $location_4->save();

        $location_5 = WarehouseLocation::create([
            'company_id' => $company,
            'parent_id' => $location_2->id,
            'warehouse_id' => $warehouse->id,
            'name' => 'Stock',
            'type' => 'internal'
        ]);
        $location_5->save();

        $location_6 = WarehouseLocation::create([
            'company_id' => $company,
            'parent_id' => $location_3->id,
            'warehouse_id' => $warehouse->id,
            'name' => 'Client',
            'type' => 'customer'
        ]);
        $location_6->save();

        $location_7 = WarehouseLocation::create([
            'company_id' => $company,
            'parent_id' => $location_3->id,
            'warehouse_id' => $warehouse->id,
            'name' => 'Fournisseur',
            'type' => 'supplier'
        ]);
        $location_7->save();

        $location_8 = WarehouseLocation::create([
            'company_id' => $company,
            'parent_id' => $location_4->id,
            'warehouse_id' => $warehouse->id,
            'name' => 'Rebuts',
            'type' => 'loss_inventory'
        ]);
        $location_8->save();

        $location_9 = WarehouseLocation::create([
            'company_id' => $company,
            'parent_id' => $location_4->id,
            'warehouse_id' => $warehouse->id,
            'name' => "Ajustement de stock",
            'type' => 'loss_inventory'
        ]);
        $location_9->save();

        // Warehouse Route
        $routes = [
            [
                'company_id' => $company,
                'warehouse_id' => $warehouse->id,
                'name' => $comp->name.'-'. str()->slug($comp->name) .': Reception en 1 étape (stock)'
            ],
            [
                'company_id' => $company,
                'warehouse_id' => $warehouse->id,
                'name' => $comp->name.'-'. str()->slug($comp->name) .': Reception en 1 étape (expédition)'
            ],
        ];
        foreach($routes as $route){
            WarehouseRoute::create($route);
        }

        // Operation Type
        $operation_type_1 = OperationType::create([
            'company_id' => $company,
            'warehouse_id' => $warehouse->id,
            'name' => 'Réceptions',
            'operation_type' => 'receipt',
            'prefix' => 'IN',
            'backorder' => 'ask'
        ]);
        $operation_type_1->save();

        $operation_type_2 = OperationType::create([
            'company_id' => $company,
            'warehouse_id' => $warehouse->id,
            'name' => 'Bons de livraison',
            'operation_type' => 'delivery',
            'prefix' => 'OUT',
            'backorder' => 'ask'
        ]);
        $operation_type_2->save();

        $operation_type_3 = OperationType::create([
            'company_id' => $company,
            'warehouse_id' => $warehouse->id,
            'name' => 'Transferts internes',
            'operation_type' => 'internal_transfer',
            'prefix' => 'STK',
            'backorder' => 'ask'
        ]);
        $operation_type_3->save();

        // Warehouse Routes Rules
        $rules = [
            [
                'company_id' => $company,
                'warehouse_id' => $warehouse->id,
                'name' => 'WH: Stock → Clients',
                'operation_type_id' => $operation_type_2->id,
                'action' => 'pull_from',
                'source_location_id' => $location_5->id,
                'destination_location_id' => $location_6->id
            ],
            [
                'company_id' => $company,
                'warehouse_id' => $warehouse->id,
                'name' => 'WH: Stock → Clients (Réapprovisionnement sur Commande)',
                'operation_type_id' => $operation_type_2->id,
                'action' => 'pull_from',
                'source_location_id' => $location_5->id,
                'destination_location_id' => $location_6->id
            ],
        ];
        foreach($rules as $rule){
            WarehouseRouteRule::create($rule);
        }
    }

    // Achat
    public function installPurchase($company){

        // Tableaux de bords
        $dashboards = [
            [
                'company_id' => $company,
                'slug' => 'purchases_dashboard',
            ],
            [
                'company_id' => $company,
                'slug' => 'suppliers_dashboard',
            ],
        ];
        foreach($dashboards as $dashboard){
            $this->installDashboard($dashboard['slug'], $company);
        }

    }

    // Fabrication
    public function installManufacturing($company){
        // Emplacements
        $warehouses = $company->warehouses();
        foreach($warehouses as $warehouse){
            WarehouseLocation::create([
                'company_id' => $company,
                'parent_id' => WarehouseLocation::isWarehouse($warehouse->id)->isName('Emplacements Virtuels')->first()->id,
                'warehouse_id' => $warehouse->id,
                'name' => 'Production',
                'type' => 'manufacturing'
            ]);
        }


    }

    // Facturation
    public function installInvoice(Company $company){
        //
    }

    public function createDashboards(int $company){

        // Create dashboards for the company
        $dash1 = Dashboard::create([
            'name' => 'Ventes',
            'slug' => 'sales',
            'company_id' => $company,
            'is_enable' => true,
        ]);
        $dash1->save();

            $sales_dashboard = AppDashboard::create([
                'name' => 'Ventes',
                'company_id' => $company,
                'parent_slug' => 'sales',
                'slug' => 'sales_dashboard',
                'dash_id' => $dash1->id,
                'app_id' => 6,
                'is_enable' => true,
            ]);
            $sales_dashboard->save();

            $products_dashboard = AppDashboard::create([
                'name' => 'Produits',
                'company_id' => $company,
                'parent_slug' => 'sales',
                'slug' => 'products_dashboard',
                'dash_id' => $dash1->id,
                'app_id' => 6,
                'is_enable' => true,
            ]);
            $products_dashboard->save();

            $pos_dashboard = AppDashboard::create([
                'name' => 'Point de vente',
                'company_id' => $company,
                'parent_slug' => 'sales',
                'slug' => 'pos_dashboard',
                'dash_id' => $dash1->id,
                'app_id' => 8,
                'is_enable' => true,
            ]);
            $pos_dashboard->save();

        $dash2 = Dashboard::create([
            'name' => 'Finance',
            'slug' => 'finances',
            'company_id' => $company,
            'is_enable' => true,
        ]);
        $dash2->save();

            $invoices_dashboard = AppDashboard::create([
                'name' => 'Facturation',
                'company_id' => $company,
                'parent_slug' => 'finances',
                'slug' => 'invoices_dashboard',
                'dash_id' => $dash2->id,
                'app_id' => 2,
                'is_enable' => true,
            ]);
            $invoices_dashboard->save();

        $dash3 = Dashboard::create([
            'name' => 'Logistiques',
            'slug' => 'logistics',
            'company_id' => $company,
            'is_enable' => true,
        ]);
        $dash3->save();

            // App Dashboards
            $purchases_dashboard = AppDashboard::create([
                'name' => 'Achats',
                'company_id' => $company,
                'parent_slug' => 'logistics',
                'slug' => 'purchases_dashboard',
                'dash_id' => $dash3->id,
                'app_id' => 4,
                'is_enable' => true,
            ]);
            $purchases_dashboard->save();

            $vendors_dashboard = AppDashboard::create([
                'name' => 'Fournisseurs',
                'company_id' => $company,
                'parent_slug' => 'logistics',
                'slug' => 'suppliers_dashboard',
                'dash_id' => $dash3->id,
                'app_id' => 4,
                'is_enable' => true,
            ]);
            $vendors_dashboard->save();

            $inventory_on_hand_dashboard = AppDashboard::create([
                'name' => 'Inventaire disponible',
                'company_id' => $company,
                'parent_slug' => 'logistics',
                'slug' => 'inventory_dashboard',
                'dash_id' => $dash3->id,
                'app_id' => 3,
                'is_enable' => true,
            ]);
            $inventory_on_hand_dashboard->save();

            $inventory_on_hand_dashboard = AppDashboard::create([
                'name' => 'Flux des stocks',
                'company_id' => $company,
                'parent_slug' => 'logistics',
                'slug' => 'stock_flow_dashboard',
                'dash_id' => $dash3->id,
                'app_id' => 3,
                'is_enable' => true,
            ]);
            $inventory_on_hand_dashboard->save();


        $dash4 = Dashboard::create([
            'name' => 'Services',
            'slug' => 'field_of_service',
            'company_id' => $company,
            'is_enable' => true,
        ]);
        $dash4->save();
            // App Dashboards
            $projects_dashboard = AppDashboard::create([
                'name' => 'Projets',
                'company_id' => $company,
                'parent_slug' => 'field_of_service',
                'slug' => 'projects_dashboard',
                'dash_id' => $dash4->id,
                'app_id' => 15,
                'is_enable' => true,
            ]);
            $projects_dashboard->save();

            $timesheets_dashboard = AppDashboard::create([
                'name' => 'Feuille de Temps',
                'company_id' => $company,
                'parent_slug' => 'field_of_service',
                'slug' => 'timesheets_dashboard',
                'dash_id' => $dash4->id,
                'app_id' => 16,
                'is_enable' => true,
            ]);
            $timesheets_dashboard->save();


        $dash5 = Dashboard::create([
            'name' => 'CRM',
            'slug' => 'crm',
            'company_id' => $company,
            'is_enable' => true,
        ]);
        $dash5->save();
            // App Dashboards
            //Leads
            $leads_dashboard = AppDashboard::create([
                'name' => 'Leads',
                'company_id' => $company,
                'parent_slug' => 'crm',
                'slug' => 'leads_dashboard',
                'dash_id' => $dash5->id,
                'app_id' => 7,
                'is_enable' => true,
            ]);
            $leads_dashboard->save();

            //Pipeline
            $leads_dashboard = AppDashboard::create([
                'name' => 'Pipeline',
                'company_id' => $company,
                'parent_slug' => 'crm',
                'slug' => 'pipelines_dashboard',
                'dash_id' => $dash5->id,
                'app_id' => 7,
                'is_enable' => true,
            ]);
            $leads_dashboard->save();


        $dash6 = Dashboard::create([
            'name' => 'Ressources Humaines',
            'slug' => 'human_resources',
            'company_id' => $company,
            'is_enable' => true,
        ]);
        $dash6->save();

        $dash7 = Dashboard::create([
            'name' => 'Site Internet',
            'slug' => 'website',
            'company_id' => $company,
            'is_enable' => true,
        ]);
        $dash7->save();
    }

    public function installDashboard(string $slug, int $companyID){

        $dashboard = InstalledDashboard::create([
            'company_id' => $companyID,
            'slug' => $slug,
        ]);
        $dashboard->save();
    }
}
