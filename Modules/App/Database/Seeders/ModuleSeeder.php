<?php

namespace Modules\App\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module\ModuleCategory;
use App\Models\Module\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $industries = [
        //     // Grocery Store
        //     [
        //         'name' => 'Grocery Store',
        //         'slug' => 'grocery-store',
        //         'parent_id' => null,
        //         'type' => 'industry_category',
        //     ],
        //     // Pharmacy Retail
        //     [
        //         'name' => 'Pharmacy Retail',
        //         'slug' => 'pharmacy-store',
        //         'parent_id' => null,
        //         'type' => 'industry_category',
        //     ],
        //     // Electronic Store
        //     [
        //         'name' => 'Electronic Store',
        //         'slug' => 'electronic-store',
        //         'parent_id' => null,
        //         'type' => 'industry_category',
        //     ],
        //     // Clothing & Boutique
        //     [
        //         'name' => 'Clothing & Boutique',
        //         'slug' => 'clothing-store',
        //         'parent_id' => null,
        //         'type' => 'industry_category',
        //     ],
        //     // Restaurant(Food & Cafés)
        //     [
        //         'name' => 'Restaurant(Food & Cafés)',
        //         'slug' => 'pharmacy-store',
        //         'parent_id' => null,
        //         'type' => 'industry_category',
        //     ],
        // ];

        // foreach ($industries as $industry) {
        //     ModuleCategory::create($industry);

        // }

        $categories = [
            // Accounting
            [
                'name' => 'Accounting',
                'slug' => 'accounting',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // Sales
            [
                'name' => 'Sales',
                'slug' => 'sales',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // Inventory
            [
                'name' => 'Inventory',
                'slug' => 'inventory',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // Manufacturing
            [
                'name' => 'Manufacturing',
                'slug' => 'manufacturing',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // Human Resources
            [
                'name' => 'Human Resources',
                'slug' => 'human_resources',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // Operations
            [
                'name' => 'Operations',
                'slug' => 'operations',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // Productivity
            [
                'name' => 'Productivity',
                'slug' => 'productivity',
                'parent_id' => null,
                'type' => 'app_category',
            ],
        ];

        foreach ($categories as $category) {
            ModuleCategory::create($category);

        }

        $modules = [
            // App Manager
            [
                'name' => 'Applications',
                'slug' => 'apps',
                'short_name'    =>  'Apps',
                'description'  =>  'Efficiently manage and oversee all your applications in one place.',
                'app_group' => 'app_settings',
                'version'  => 'v1.0',
                'author'    => 'Koverae Ltd Ltd',
                'icon'  => 'apps',
                'is_default'    => 1,
                'link'  => 'apps.index',
                'path'  => "app::layouts.navbar-menu",
                'navbar_id' => 1,
                'enabled'   => 1
            ],

            // Settings
            [
                'name' => 'Settings',
                'slug' => 'settings',
                'short_name'    =>  'Settings',
                'description'  =>  'Configure your preferences to optimize your experience.',
                'app_group' => 'app_settings',
                'version'  => 'v1.0',
                'author'    => 'Koverae Ltd Ltd',
                'icon'  => 'settings',
                'is_default'    => 1,
                'link'  => 'settings.general',
                'path'  => "settings::layouts.navbar-menu",
                'navbar_id' => 2,
                'enabled'   => 1
            ],

            // Dashboard
            [
                'name' => 'Dashboards',
                'slug' => 'dashboards',
                'module_category_id' => 7,
                'short_name'    =>  'Dashboards',
                'description'  =>  'Customize your reports to align with your business needs.',
                'version'  => 'v1.0',
                'author'    => 'Koverae Ltd Ltd',
                'icon'  => 'dashboards',
                'is_default'    => 1,
                'link'  => 'dashboards.index',
                'path'  => 'dashboards::layouts.navbar-menu',
                'navbar_id' => 3,
                'enabled'   => 1
            ],

            // Contact
            [
                'name' => 'Contacts',
                'slug' => 'contact',
                'module_category_id' => 2,
                'short_name'    =>  'Contacts',
                'description'  =>  "Organize and access all your contacts effortlessly in one place.",
                'app_group' => 'sales',
                'version'  => 'v1.0',
                'author'    => 'Koverae Ltd Ltd',
                'icon'  => 'contact',
                'is_default'    => 0,
                'link'  => 'contacts.index',
                'path'  => 'contact::layouts.navbar-menu',
                'navbar_id' => 4,
                'enabled'   => 1
            ],
            
            // Invoicing
            [
                'name' => 'Invoicing',
                'module_category_id' => 1,
                'slug' => 'invoice',
                'short_name'    =>  'Invoicing',
                'description'  =>  'Manage your finances with ease by generating and tracking invoices seamlessly.',
                'app_group' => 'finance',
                'version'  => 'v1.0',
                'author'    => 'Koverae Ltd',
                'icon'  => 'invoice',
                'is_default'    => 1,
                'link'  => 'invoices.index',
                'path'  => "invoicing::layouts.navbar-menu",
                'navbar_id' => 5,
                'enabled'   => 1
            ],

            //Sales
            [
                'name' => 'Sales',
                'module_category_id' => 2,
                // 'parent_slug' => 'invoice',
                'slug' => 'sales',
                'short_name'    =>  'Sales',
                'description'  =>  'Efficiently manage the sales process from generating quotations to issuing invoices.',
                'app_group' => 'sales',
                'version'  => 'v1.0',
                'author'    => 'Koverae Ltd',
                'icon'  => 'sales',
                'is_default'    => 0,
                'link'  => 'sales.quotations.index',
                'path'  => 'sales::layouts.navbar-menu',
                'navbar_id' => 6,
                'enabled'   => 1
            ],
            
            //CRM
            [
                'name' => 'Customer Relationship Management',
                'module_category_id' => 2,
                'parent_slug' => 'calendar',
                'slug' => 'crm',
                'short_name'    =>  'CRM',
                'description'  =>  'Manage your customers and opportunities more effectively.',
                'app_group' => 'sales',
                'version'  => 'v1.0',
                'author'    => 'Koverae Ltd',
                'icon'  => 'crm',
                'is_default'    => 0,
                'link'  => 'crm.pipelines.index',
                'path'  => "crm::layouts.navbar-menu",
                'navbar_id' => 7,
                'enabled'   => 1
            ],

            //Calendar
            [
                'name' => 'Calendar',
                'module_category_id' => 7,
                // 'parent_slug' => 'crm',
                'slug' => 'calendar',
                'short_name'    =>  'Calendar',
                'description'  => "Schedule employees' meetings and events",
                'app_group' => 'productivity',
                'version'  => 'v1.0',
                'author'    => 'Koverae Ltd',
                'icon'  => 'calendar',
                'is_default'    => 0,
                'link'  => 'calendar.index',
                'path'  => "calendar::layouts.navbar-menu",
                'navbar_id' => 8,
                'enabled'   => 1
            ],

            // Inventory
            [
                'name' => 'Inventory',
                'module_category_id' => 3,
                'slug' => 'inventory',
                'short_name'    =>  'Inventory',
                'description'  =>  'Keep your inventory and logistics operations under control.',
                'app_group' => 'inventory_manufacture',
                'version'  => 'v1',
                'author'    => 'Koverae',
                'icon'  => 'inventory',
                'is_default'    => 0,
                'link'  => 'inventory.index',
                'path'  => 'inventory::layouts.navbar-menu',
                'navbar_id' => 9,
                'enabled'   => 1
            ],

            // Barcode
            [
                'name' => 'Barcodes',
                'module_category_id' => 3,
                'parent_slug' => 'inventory',
                'slug' => 'barcode',
                'short_name'    =>  'Codes Barres',
                'description'  =>  'Use barcode scanners to process your logistics operations.',
                'app_group' => 'inventory_manufacture',
                'version'  => 'v1.0',
                'author'    => 'Koverae',
                'icon'  => 'barcode',
                'is_default'    => 0,
                'link'  => 'barcode.index',
                'path'  => "barcode::layouts.navbar-menu",
                'navbar_id' => 10,
                'enabled'   => 1
            ],
            // Purchase
            [
                'name' => 'Purchases',
                'module_category_id' => 3,
                'parent_slug' => 'inventory',
                'slug' => 'purchase',
                'short_name'    =>  'Purchases',
                'description'  =>  'Efficiently control your supplies',
                'app_group' => 'inventory_manufacture',
                'version'  => 'v1.0',
                'author'    => 'Koverae',
                'icon'  => 'purchase',
                'is_default'    => 0,
                'link'  => 'purchases.requests.index',
                'path'  => 'purchase::layouts.navbar-menu',
                'navbar_id' => 11,
                'enabled'   => 1
            ],

        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
