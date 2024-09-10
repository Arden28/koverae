<?php

namespace Modules\App\Services;

use App\Models\Company\Company;
use App\Models\Module\InstalledModule as ModuleInstalledModule;
use App\Models\Module\Module;
use App\Models\User;
use Modules\Accounting\Entities\Journal;
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
use Modules\Invoicing\Entities\Incoterm;
use Modules\Invoicing\Entities\Tax\Tax;
use Modules\Pos\Entities\Coin\CoinBill;
use Modules\Pos\Entities\Payment\PosPaymentMethod;
use Modules\Pos\Entities\Pos\Pos;
use Modules\Pos\Entities\Pos\PosSetting;
use Modules\Sales\Entities\Price\PriceList;
use Modules\Sales\Entities\SalesPerson;
use Modules\Sales\Entities\SalesTeam;
use Modules\Sales\Entities\SalesTeamMember;
use Modules\Settings\Entities\Currency;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Entities\System\SystemParameter;
use Ramsey\Uuid\Uuid;

class AppInstallationService
{
    /**
     * Install a module for a company.
     *
     * @param string $moduleSlug
     * @param int $companyId
     * @return string
     */
    public function installModule(string $moduleSlug, int $companyId): string
    {
        $module = Module::where('slug', $moduleSlug)->firstOrFail();
        $company = Company::findOrFail($companyId);

        // Install parent module if exists and not installed
        $this->installParentModule($module, $companyId, $company);

        // Install the module if not already installed
        if (!$module->isInstalledBy($company)) {
            $installedModule = $this->installModuleData($moduleSlug, $companyId);
            $this->installAppData($companyId, $installedModule->module_slug);
        }

        return "Top";
    }

    /**
     * Install parent module recursively.
     *
     * @param Module $module
     * @param int $companyId
     * @param Company $company
     */
    private function installParentModule(Module $module, int $companyId, Company $company): void
    {
        if ($module->parent_slug) {
            $parentModule = Module::where('slug', $module->parent_slug)->firstOrFail();
            if (!$parentModule->isInstalledBy($company)) {
                $installedParent = $this->installModuleData($module->parent_slug, $companyId);
                $this->installAppData($companyId, $installedParent->module_slug);
                // Recursively install grandparent modules if necessary
                $this->installParentModule($parentModule, $companyId, $company);
            }
        }
    }

    /**
     * Create and save module installation data.
     *
     * @param string $moduleSlug
     * @param int $companyId
     * @return ModuleInstalledModule
     */
    private function installModuleData(string $moduleSlug, int $companyId): ModuleInstalledModule
    {
        return ModuleInstalledModule::create([
            'company_id' => $companyId,
            'module_slug' => $moduleSlug,
        ]);
    }

    /**
     * Install the necessary application data based on module slug.
     *
     * @param int $companyId
     * @param string $slug
     */
    public function installAppData(int $companyId, string $slug): void
    {
        $method = 'install' . ucfirst($slug);
        if (method_exists($this, $method)) {
            $this->$method($companyId);
        }
    }
    
    /**
     * Uninstall a module for a company.
     *
     * @param string $moduleSlug
     * @return string
     */
    public function uninstallModule(string $moduleSlug): void
    {

        $app = ModuleInstalledModule::where('module_slug', $moduleSlug)->first();
        $app->delete();
    }

    /**
     * Install basic applications for a company.
     *
     * @param int $companyId
     */
    public function installBasicApp(int $companyId): void
    {
        $apps = [
            'apps', 'settings', 'dashboards', 'contact', 'invoice'
        ];

        foreach ($apps as $appSlug) {
            $this->installModule($appSlug, $companyId);
        }

        $this->createDashboards($companyId);
    }

    /**
     * Install basic app data such as currencies, system parameters, settings, etc.
     *
     * @param int $companyId
     */
    public function installBasicAppData(int $companyId): void
    {
        $company = Company::findOrFail($companyId);

        // Install currencies
        $this->installCurrencies($companyId);

        // Install company settings and system parameters
        $this->installCompanySettings($company);

        // Install default taxes
        $this->installDefaultTaxes($companyId);

        // Install units of measure
        $this->installUnitsOfMeasure($companyId);

        // Install product categories
        $this->installProductCategories($companyId);
    }
    
    /**
     * Install invoice-related data such as dashboards, payment terms, etc.
     *
     * @param int $companyId
     */
    public function installInvoice(int $companyId){
        
        $this->createInvoicingDashboards($companyId);
        
        //Conditions de paiement

        // Incoterms
        $incoterms = [
            [
                'company_id' => $companyId,
                'code' => "EXW",
                'name' => "À L'USINE"
            ],
            [
                'company_id' => $companyId,
                'code' => "FCA",
                'name' => "FRANCO TRANSPORTEUR"
            ],
            [
                'company_id' => $companyId,
                'code' => "FAS",
                'name' => "FRANCO LE LONG DU NAVIRE"
            ],
            [
                'company_id' => $companyId,
                'code' => "FOB",
                'name' => "FRANCO À BORD DU NAVIRE"
            ],
            [
                'company_id' => $companyId,
                'code' => "CFR",
                'name' => "COÛT ET FRET"
            ],
            [
                'company_id' => $companyId,
                'code' => "CIF",
                'name' => "COÛT, ASSURANCE ET FRET"
            ],
            [
                'company_id' => $companyId,
                'code' => "CPT",
                'name' => "PORT PAYÉ JUSQU'À"
            ],
            [
                'company_id' => $companyId,
                'code' => "CIP",
                'name' => "PORT PAYÉ, ASSURANCE COMPRISE JUSQU'À"
            ],
            [
                'company_id' => $companyId,
                'code' => "DPU",
                'name' => "RENDU AU LIEU DE DESTINATION DÉCHARGÉ"
            ],
            [
                'company_id' => $companyId,
                'code' => "DAP",
                'name' => "RENDU AU LIEU DE DESTINATION"
            ],
            [
                'company_id' => $companyId,
                'code' => "DDP",
                'name' => "RENDU DROITS ACQUITTÉS"
            ],
        ];
        foreach($incoterms as $incoterm){
            Incoterm::create($incoterm);
        }

        // Journaux Comptable
        $journals = [
            [
                'company_id' => $companyId,
                'name' => 'Factures clients',
                'type' => 'sale',
                'short_code' => 'INV'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Factures fournisseurs',
                'type' => 'purchase',
                'short_code' => 'BILL'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Opérations diverses',
                'type' => 'miscellaneous',
                'short_code' => 'MISC'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Valorisation des stocks',
                'type' => 'miscellaneous',
                'short_code' => 'STJ'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Différence de change',
                'type' => 'miscellaneous',
                'short_code' => 'EXCH'
            ],
            [
                'company_id' => $companyId,
                'name' => 'TVA sur encaissements',
                'type' => 'miscellaneous',
                'short_code' => 'CABA'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Banque',
                'type' => 'bank',
                'short_code' => 'BNK1'
            ],
            [
                'company_id' => $companyId,
                'name' => 'Espèces',
                'type' => 'cash',
                'short_code' => 'CSH1'
            ],
        ];
        foreach($journals as $journal){
            Journal::create($journal);
        }

        //
    }


    /**
     * Install employee-related data such as departments, employees, job types, etc.
     *
     * @param int $companyId
     */
    public function installEmployee(int $companyId): void
    {

        // Create departments
        $department = Department::create([
            'company_id' => $companyId,
            'name' => 'Administration',
        ]);

        // Assign employees to department
        $users = User::isCompany($companyId)->get();
        foreach ($users as $user) {
            Employee::create([
                'company_id' => $companyId,
                'user_id' => $user->id,
                'department_id' => $department->id,
            ]);
        }

        // Install job types and workplaces
        $this->installJobTypes($companyId);
        $this->installWorkplaces($companyId);

        // Install work schedule
        WorkSchedule::create([
            'company_id' => $companyId,
            'name' => 'Norme 40 heures/semaine',
            'average_hour_per_day' => 7,
            'timezone' => 'UTC',
        ]);
    }

    /**
     * Install sales-related data such as sales teams, price lists, email templates, etc.
     *
     * @param int $companyId
     */
    public function installSales(int $companyId): void
    {
        // Create sales teams
        $salesTeam = SalesTeam::create([
            'company_id' => $companyId,
            'name' => 'Barakuda',
        ]);

        $company = Company::findOrFail($companyId);
        $user = $company->users()->first();

        // Assign user to sales team and create sales person
        SalesTeamMember::create([
            'company_id' => $companyId,
            'sales_team_id' => $salesTeam->id,
            'user_id' => $user->id,
        ]);

        SalesPerson::create([
            'company_id' => $companyId,
            'user_id' => $user->id,
            'sales_team_id' => $salesTeam->id,
        ]);

        // Create price lists
        PriceList::create([
            'company_id' => $companyId,
            'name' => 'Liste de prix XAF par défaut',
        ]);

        // Install email templates
        $this->installSalesEmailTemplates($companyId, $user);
    }

    /**
     * Install inventory-related data such as warehouses, locations, operation types, etc.
     *
     * @param int $companyId
     */
    public function installInventory(int $companyId): void
    {
        $company = Company::findOrFail($companyId);

        // Create warehouse
        $warehouse = Warehouse::create([
            'company_id' => $companyId,
            'name' => str()->slug($company->name),
            'short_name' => 'WH',
            'address' => $company->address,
        ]);

        // Create warehouse locations
        $this->installWarehouseLocations($companyId, $warehouse);

        // Create warehouse routes and operation types
        $this->installWarehouseRoutesAndOperations($companyId, $warehouse);
    }

    /**
     * Install purchasing-related data such as dashboards and email templates.
     *
     * @param int $companyId
     */
    public function installPurchase(int $companyId): void
    {
        // Install dashboards
        $this->createPurchaseDashboards($companyId);

        $company = Company::findOrFail($companyId);
        $user = $company->users()->first();

        // Install purchase email templates
        $this->installPurchaseEmailTemplates($companyId, $user);
    }

    /**
     * Install Point of Sale (POS) related data such as coins, bills, POS settings, etc.
     *
     * @param int $companyId
     */
    public function installPos(int $companyId): void
    {
        // Create coins and bills
        $this->installCoinsAndBills($companyId);

        // Create POS and settings
        $pos = Pos::create([
            'company_id' => $companyId,
            'name' => 'Boutique',
            'private_key' => Uuid::uuid4(),
        ]);

        PosSetting::create([
            'company_id' => $companyId,
            'pos_id' => $pos->id,
        ]);

        // Install POS operation types
        $this->installPosOperationTypes($companyId);

        // Install payment methods
        $this->installPosPaymentMethods($companyId);
    }

    /**
     * Install manufacturing-related data such as production locations and operation types.
     *
     * @param int $companyId
     */
    public function installManufacturing(int $companyId): void
    {
        $company = Company::findOrFail($companyId);
        $warehouses = $company->warehouses;

        // Create operation types for manufacturing
        foreach ($warehouses as $warehouse) {
            OperationType::create([
                'company_id' => $companyId,
                'warehouse_id' => $warehouse->id,
                'name' => 'Production',
                'operation_type' => 'manufacturing',
                'prefix' => 'MO',
                'backorder' => 'ask',
            ]);
        }

        // Create production locations
        foreach ($warehouses as $warehouse) {
            WarehouseLocation::create([
                'company_id' => $companyId,
                'parent_id' => WarehouseLocation::isWarehouse($warehouse->id)->isName('Emplacements Virtuels')->first()->id,
                'warehouse_id' => $warehouse->id,
                'name' => 'Production',
                'type' => 'production',
            ]);
        }
    }

    /**
     * Create dashboards for the company.
     *
     * @param int $companyId
     */
    public function createDashboards(int $companyId): void
    {
        $dashboards = [
            ['name' => 'Ventes', 'slug' => 'sales'],
            ['name' => 'Finance', 'slug' => 'finances'],
            ['name' => 'Logistiques', 'slug' => 'logistics'],
            ['name' => 'Services', 'slug' => 'field_of_service'],
            ['name' => 'CRM', 'slug' => 'crm'],
            ['name' => 'Ressources Humaines', 'slug' => 'human_resources'],
            ['name' => 'Site Internet', 'slug' => 'website'],
            ['name' => 'Abonnements', 'slug' => 'subscriptions'],
        ];

        foreach ($dashboards as $dashboardData) {
            $dashboard = Dashboard::create([
                'name' => $dashboardData['name'],
                'slug' => $dashboardData['slug'],
                'company_id' => $companyId,
                'is_enable' => true,
            ]);

            // Install apps within the dashboards
            $this->installDashboardApps($dashboard, $companyId);
        }
    }

    /**
     * Install specific dashboard apps based on the dashboard slug.
     *
     * @param Dashboard $dashboard
     * @param int $companyId
     */
    private function installDashboardApps(Dashboard $dashboard, int $companyId): void
    {
        $apps = match ($dashboard->slug) {
            'sales' => [
                ['name' => 'Sales', 'slug' => 'sales_dashboard', 'app_id' => 6],
                ['name' => 'Products', 'slug' => 'products_dashboard', 'app_id' => 6],
                ['name' => 'Point Of Sales', 'slug' => 'pos_dashboard', 'app_id' => 8],
            ],
            'finances' => [
                ['name' => 'Accounting', 'slug' => 'accounting_dashboard', 'app_id' => 2],
                ['name' => 'Invoicing', 'slug' => 'invoices_dashboard', 'app_id' => 2],
            ],
            'logistics' => [
                ['name' => 'Purchase', 'slug' => 'purchases_dashboard', 'app_id' => 4],
                ['name' => 'Suppliers', 'slug' => 'suppliers_dashboard', 'app_id' => 4],
                ['name' => 'On Hand Inventory', 'slug' => 'inventory_dashboard', 'app_id' => 3],
            ],
            default => [],
        };

        foreach ($apps as $app) {
            AppDashboard::create([
                'name' => $app['name'],
                'company_id' => $companyId,
                'parent_slug' => $dashboard->slug,
                'slug' => $app['slug'],
                'dash_id' => $dashboard->id,
                'app_id' => $app['app_id'],
                'is_enable' => true,
            ]);
        }
    }

    /**
     * Install specific dashboards for invoicing.
     *
     * @param int $companyId
     */
    private function createInvoicingDashboards(int $companyId): void
    {
        $dashboards = [
            ['slug' => 'invoices_dashboard', 'parent_slug' => 'finances'],
        ];

        foreach ($dashboards as $dashboard) {
            $this->installDashboard($dashboard['slug'], $companyId, $dashboard['parent_slug']);
        }
    }

    /**
     * Install specific dashboards for purchases.
     *
     * @param int $companyId
     */
    private function createPurchaseDashboards(int $companyId): void
    {
        $dashboards = [
            ['slug' => 'purchases_dashboard', 'parent_slug' => 'logistics'],
            ['slug' => 'suppliers_dashboard', 'parent_slug' => 'logistics'],
        ];

        foreach ($dashboards as $dashboard) {
            $this->installDashboard($dashboard['slug'], $companyId, $dashboard['parent_slug']);
        }
    }

    /**
     * Install a specific dashboard.
     *
     * @param string $slug
     * @param int $companyId
     * @param string $parentSlug
     */
    public function installDashboard(string $slug, int $companyId, string $parentSlug): void
    {
        InstalledDashboard::create([
            'company_id' => $companyId,
            'slug' => $slug,
            'parent_slug' => $parentSlug,
        ]);
    }

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
     * Install default company settings and system parameters.
     *
     * @param Company $company
     */
    private function installCompanySettings(Company $company): void
    {
        $defaultCurrency = Currency::where('code', $company->default_currency)->firstOrFail();

        SystemParameter::create([
            'company_id' => $company->id,
            'database_create_date' => now(),
            'database_expiration_date' => now()->addDays(14),
        ]);

        Setting::create([
            'company_id' => $company->id,
            'default_currency_id' => $defaultCurrency->id,
            'default_currency_position' => $defaultCurrency->symbol_position,
        ]);
    }

    /**
     * Install default taxes for the company.
     *
     * @param int $companyId
     */
    private function installDefaultTaxes(int $companyId): void
    {
        $taxes = [
            ['name' => '18.9%', 'type' => 'sales', 'amount' => 18.90],
            ['name' => '18.9%', 'type' => 'purchases', 'amount' => 18.90],
        ];

        foreach ($taxes as $tax) {
            Tax::create(array_merge(['company_id' => $companyId], $tax));
        }
    }

    /**
     * Install units of measure for the company.
     *
     * @param int $companyId
     */
    private function installUnitsOfMeasure(int $companyId): void
    {
        $categories = [
            'Unité', 'Poids', 'Temps de travail', 'Longueur / Distance', 'Superficie', 'Volume'
        ];

        foreach ($categories as $name) {
            $category = UnitOfMeasureCategory::create([
                'company_id' => $companyId,
                'name' => $name,
            ]);

            // Add units of measure to this category...
        }
    }

    /**
     * Install product categories for the company.
     *
     * @param int $companyId
     */
    private function installProductCategories(int $companyId): void
    {
        $rootCategory = Category::create([
            'company_id' => $companyId,
            'category_name' => 'Tout',
        ]);

        $categories = [
            ['category_name' => 'Dépenses', 'parent_id' => $rootCategory->id],
            ['category_name' => 'Vendable', 'parent_id' => $rootCategory->id],
        ];

        foreach ($categories as $category) {
            Category::create(array_merge(['company_id' => $companyId], $category));
        }
    }

    /**
     * Install sales email templates.
     *
     * @param int $companyId
     * @param User $user
     */
    private function installSalesEmailTemplates(int $companyId, User $user): void
    {
        $templates = [
            [
                'apply_to' => 'quotation',
                'name' => 'Sales: Send Quotation',
                'subject' => '{company_name} Order (Ref {reference})',
                'content' => "Hello,<br>Your quotation {reference} amounting to <b>{total_amount}</b> is ready for review.<br><br>Do not hesitate to contact us if you have any questions.<br><br>--{sender}",
            ],
            // Add more templates here...
        ];

        foreach ($templates as $template) {
            EmailTemplate::create(array_merge(['company_id' => $companyId, 'sender_email' => $user->email], $template));
        }
    }

    /**
     * Install coins and bills for POS.
     *
     * @param int $companyId
     */
    private function installCoinsAndBills(int $companyId): void
    {
        $coinsAndBills = [
            ['name' => '25', 'type' => 'coin', 'value' => 25],
            ['name' => '500', 'type' => 'bill', 'value' => 500],
            // Add more coins and bills here...
        ];

        foreach ($coinsAndBills as $item) {
            CoinBill::create(array_merge(['company_id' => $companyId], $item));
        }
    }

    /**
     * Install POS operation types for the company.
     *
     * @param int $companyId
     */
    private function installPosOperationTypes(int $companyId): void
    {
        $warehouses = Warehouse::isCompany($companyId)->get();

        foreach ($warehouses as $warehouse) {
            OperationType::create([
                'company_id' => $companyId,
                'warehouse_id' => $warehouse->id,
                'name' => 'Commande du Pdv',
                'operation_type' => 'delivery',
                'prefix' => 'POS',
                'backorder' => 'ask',
            ]);
        }
    }

    /**
     * Install POS payment methods for the company.
     *
     * @param int $companyId
     */
    private function installPosPaymentMethods(int $companyId): void
    {
        $methods = [
            ['name' => 'Espèces', 'journal_id' => Journal::isCompany($companyId)->isCode('BNK1')->first()->id],
            ['name' => 'Banque', 'journal_id' => Journal::isCompany($companyId)->isCode('CSH1')->first()->id],
        ];

        foreach ($methods as $method) {
            PosPaymentMethod::create(array_merge(['company_id' => $companyId], $method));
        }
    }

    /**
     * Install job types for the company.
     *
     * @param int $companyId
     */
    private function installJobTypes(int $companyId): void
    {
        $jobTypes = ['Permanent', 'Temporaire', 'Saisonnier', 'Temps partiel', 'Temps plein', 'Stage'];

        foreach ($jobTypes as $title) {
            JobType::create(['company_id' => $companyId, 'title' => $title]);
        }
    }

    /**
     * Install workplaces for the company.
     *
     * @param int $companyId
     */
    private function installWorkplaces(int $companyId): void
    {
        $workplaces = ['A distance', 'Sur sites', 'Autres'];

        foreach ($workplaces as $title) {
            Workplace::create(['company_id' => $companyId, 'title' => $title]);
        }
    }

    /**
     * Install warehouse locations.
     *
     * @param int $companyId
     * @param Warehouse $warehouse
     */
    private function installWarehouseLocations(int $companyId, Warehouse $warehouse): void
    {
        $locations = [
            ['name' => 'Emplacements Physiques', 'type' => 'view'],
            ['name' => 'WH', 'type' => 'view'],
            ['name' => 'Stock', 'type' => 'internal'],
        ];

        foreach ($locations as $location) {
            WarehouseLocation::create(array_merge(['company_id' => $companyId, 'warehouse_id' => $warehouse->id], $location));
        }
    }

    /**
     * Install warehouse routes and operation types.
     *
     * @param int $companyId
     * @param Warehouse $warehouse
     */
    private function installWarehouseRoutesAndOperations(int $companyId, Warehouse $warehouse): void
    {
        $routes = [
            ['name' => 'Recevoir en 1 étape (stock)', 'warehouse_id' => $warehouse->id],
            ['name' => 'Livrer en 1 étape (expédition)', 'warehouse_id' => $warehouse->id],
        ];

        foreach ($routes as $route) {
            WarehouseRoute::create(array_merge(['company_id' => $companyId], $route));
        }

        // Create operation types
        $operationTypes = [
            ['name' => 'Réceptions', 'operation_type' => 'receipt', 'prefix' => 'IN'],
            ['name' => 'Bons de livraison', 'operation_type' => 'delivery', 'prefix' => 'OUT'],
        ];

        foreach ($operationTypes as $type) {
            OperationType::create(array_merge(['company_id' => $companyId, 'warehouse_id' => $warehouse->id], $type));
        }
    }

    /**
     * Install purchase email templates.
     *
     * @param int $companyId
     * @param User $user
     */
    private function installPurchaseEmailTemplates(int $companyId, User $user): void
    {
        $templates = [
            [
                'apply_to' => 'requestion-quotation',
                'name' => 'Purchase: Request For Quotation',
                'subject' => '{company_name} Order (Ref {reference})',
                'content' => "Dear {supplier_name},<br>Here is a request for quotation <b>{reference}</b> from {company_name}.<br><br>Best regards,<br>--{sender}",
            ],
            // Add more templates here...
        ];

        foreach ($templates as $template) {
            EmailTemplate::create(array_merge(['company_id' => $companyId, 'sender_email' => $user->email], $template));
        }
    }

}
