<?php

namespace Database\Seeders;

use App\Models\Module\Module;
use App\Models\Module\ModuleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            // 1
            [
                'name' => 'Comptabilité',
                'slug' => 'accounting',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // 2
            [
                'name' => 'Ventes',
                'slug' => 'sales',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // 3
            // [
            //     'name' => 'Paramètres',
            //     'slug' => 'app_settings',
            //     'parent_id' => null,
            //     'type' => 'app_category',
            // ],
            // 4
            [
                'name' => 'Inventaire',
                'slug' => 'inventory',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // 5
            [
                'name' => 'Fabrication',
                'slug' => 'manufacturing',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // 6
            [
                'name' => 'Ressources humaines',
                'slug' => 'human_resources',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // 7
            [
                'name' => 'Opérations',
                'slug' => 'operations',
                'parent_id' => null,
                'type' => 'app_category',
            ],
            // 8
            [
                'name' => 'Productivité',
                'slug' => 'productivity',
                'parent_id' => null,
                'type' => 'app_category',
            ],
        ];


        foreach ($categories as $category) {
            ModuleCategory::create($category);

        }

        $modules = [

            // Apps & Settings
            [
                'name' => 'Paramètres',
                'category_id' => null,
                'slug' => 'settings',
                'short_name'    =>  'Paramètres',
                'description'  =>  'Adaptez Koverae à votre entreprise.',
                'app_group' => 'app_settings',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'settings',
                'is_default'    => 1,
                'link'  => 'settings.general',
                'path'  => "setting::layouts.navbar-menu",
                'navbar_id' => 19,
                'enabled'   => 1
            ],
            [
                'name' => 'Applications',
                'category_id' => null,
                'slug' => 'apps',
                'short_name'    =>  'Applications',
                'description'  =>  'Adaptez Koverae à votre entreprise.',
                'app_group' => 'app_settings',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'apps',
                'is_default'    => 1,
                'link'  => 'apps.index',
                'path'  => "app::layouts.navbar-menu",
                'navbar_id' => 21,
                'enabled'   => 1
            ],

            // Dashboard
            [
                'name' => 'Tableaux de bords',
                'category_id' => 8,
                'slug' => 'dashboards',
                'short_name'    =>  'Tableaux de bords',
                'description'  =>  'Adapter vos rapports à votre entreprise.',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'dashboards',
                'is_default'    => 1,
                'link'  => 'dashboards.index',
                'path'  => 'dashboards::layouts.navbar-menu',
                'navbar_id' => 5,
                'enabled'   => 1
            ],

            //Accounting
            [
                'name' => 'Comptabilité',
                'category_id' => 1,
                'slug' => 'finance',
                'short_name'    =>  'Comptabilité',
                'description'  =>  'Ayez plus de contrôle sur les finances de votre entreprise.',
                'app_group' => 'finance',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'accounting',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            // Invoicing
            [
                'name' => 'Facturation',
                'category_id' => 1,
                'slug' => 'invoice',
                'short_name'    =>  'Factures',
                'description'  =>  'Générez et envoyez simplement des factures.',
                'app_group' => 'finance',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'invoice',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            // Inventory
            [
                'name' => 'Inventaire',
                'category_id' => 3,
                'slug' => 'inventory',
                'short_name'    =>  'Inventaire',
                'description'  =>  'Gardez vos stocks et vos opérations logisitiques sous contrôles.',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'inventory',
                'is_default'    => 0,
                'link'  => 'inventory.index',
                'path'  => 'inventory::layouts.navbar-menu',
                'navbar_id' => 4,
                'enabled'   => 1
            ],
            // Barcode
            [
                'name' => 'Codes Barres',
                'category_id' => 3,
                'parent_slug' => 'inventory',
                'slug' => 'barcode',
                'short_name'    =>  'Codes Barres',
                'description'  =>  'Utiliser des lecteurs de codes-barres pour traiter vos opérations logistiques',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'barcode',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            // Purchase
            [
                'name' => 'Achats',
                'category_id' => 3,
                'parent_slug' => 'inventory',
                'slug' => 'purchase',
                'short_name'    =>  'Achats',
                'description'  =>  'Maîtrisez vos approvisionnements en toute efficacité.',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'purchase',
                'is_default'    => 0,
                'link'  => 'purchases.requests.index',
                'path'  => 'purchase::layouts.navbar-menu',
                'navbar_id' => 1,
                'enabled'   => 1
            ],
            // Manufacturing
            [
                'name' => 'Fabrication',
                'category_id' => 5,
                'parent_slug' => 'inventory',
                'slug' => 'manufacturing',
                'short_name'    =>  'Fabrication',
                'description'  =>  'Produisez en toute simplicité et fiabilité',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'mrp',
                'is_default'    => 0,
                'link'  => 'manufacturing.orders.index',
                'path'  => 'manufacturing::layouts.navbar-menu',
                'navbar_id' => 14,
                'enabled'   => 1
            ],
            // Quality
            [
                'name' => 'Qualité',
                'category_id' => 5,
                'parent_slug' => 'manufacturing',
                'slug' => 'quality',
                'short_name'    =>  'Qualité',
                'description'  =>  'Contrôlez la qualité de vos produits',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'quality',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            //Employees
            [
                'name' => 'Personnel',
                'category_id' => 6,
                'slug' => 'employee',
                'short_name'    =>  'Personnel',
                'description'  =>  'Centraliser les informations sur vos employés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'employee',
                'is_default'    => 0,
                'link'  => 'employee.index',
                'path'  => 'employee::layouts.navbar-menu',
                'navbar_id' => 6,
                'enabled'   => 1
            ],
            //Employees Contracts
            [
                'name' => 'Contrats Employés',
                'category_id' => 6,
                'parent_slug' => 'employee',
                'slug' => 'employee_contract',
                'short_name'    =>  'Contrat',
                'description'  =>  'Gérez les contrats de vos employés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'employee_contract',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            //Employee expenses
            [
                'name' => 'Charges',
                'category_id' => 6,
                'parent_slug' => 'employee',
                'slug' => 'expenses',
                'short_name'    =>  'Charges',
                'description'  =>  'Soumettre, valider et rembourser les dépenses des employés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'expenses',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            //Employees Time off
            [
                'name' => 'Congés employés',
                'category_id' => 6,
                'parent_slug' => 'employee',
                'slug' => 'timeoff',
                'short_name'    =>  'Congés',
                'description'  =>  'Allouer des congés payés et suivre les demandes de congés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'timeoff',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            //Employees Payroll
            [
                'name' => 'Paies Employés',
                'category_id' => 6,
                'parent_slug' => 'employee',
                'slug' => 'payroll',
                'short_name'    =>  'Paie',
                'description'  =>  'Gérez les fiches de paie de vos employés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'payroll',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            //Sales
            [
                'name' => 'Ventes',
                'category_id' => 2,
                'parent_slug' => 'invoice',
                'slug' => 'sales',
                'short_name'    =>  'Ventes',
                'description'  =>  'Enregistrez et gérez vos ventes.',
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'sales',
                'is_default'    => 0,
                'link'  => 'sales.quotations.index',
                'path'  => 'sales::layouts.navbar-menu',
                'navbar_id' => 2,
                'enabled'   => 1
            ],
            //CRM
            [
                'name' => 'Relation Clients',
                'category_id' => 2,
                'parent_slug' => 'sales',
                'slug' => 'crm',
                'short_name'    =>  'CRM',
                'description'  =>  'Gérez plus efficacement vos clients et opportunités.',
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'crm',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            //POS
            [
                'name' => 'Point de Vente',
                'category_id' => 2,
                'parent_slug' => 'inventory',
                'slug' => 'pos',
                'short_name'    =>  'Pdv',
                'description'  =>  'Une interface adaptée pour les magasins et les restaurants',
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'pos',
                'is_default'    => 0,
                'link'  => 'pos.index',
                'path'  => 'pos::layouts.navbar-menu',
                'navbar_id' => 7,
                'enabled'   => 1
            ],
            // Contact
            [
                'name' => 'Contacts',
                'category_id' => 2,
                'slug' => 'contact',
                'short_name'    =>  'Contacts',
                'description'  =>  "Centralisez votre carnet d'adresse",
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'contact',
                'is_default'    => 0,
                'link'  => 'contacts.index',
                'path'  => 'contact::layouts.navbar-menu',
                'navbar_id' => 3,
                'enabled'   => 1
            ],
            // Subscription
            [
                'name' => 'Abonnements',
                'category_id' => 2,
                'slug' => 'subscription',
                'short_name'    =>  'Abonnements',
                'description'  =>  "Générez des factures récurrentes et gérez les renouvellements",
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'subscription',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => "subscription::layouts.navbar-menu",
                'navbar_id' => 10,
                'enabled'   => 1
            ],
            // Task
            [
                'name' => 'ToDo',
                'category_id' => 8,
                'slug' => 'task',
                'short_name'    =>  'ToDo',
                'description'  =>  'Programmer votre temps et vos ressources effecacement',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'todo',
                'is_default'    => 1,
                'link'  => 'main',
                'path'  => 'task::layouts.navbar-menu',
                'navbar_id' => 5,
                'enabled'   => 1
            ],

            // [
            //     'name' => 'E-Learning',
            //     'slug' => 'e-learning',
            //     'short_name'    =>  'E-Learning',
            //     'description'  =>  'Créer, Partager et gérez vos formations.',
            //     'version'  => 'beta',
            //     'author'    => 'Koverae',
            //     'icon'  => 'finance',
            //     'is_default'    => 0,
            //     'link'  => 'main',
            //     'path'  => null,
            //     'navbar_id' => null,
            //     'enabled'   => 1
            // ],

            [
                'name' => 'Service',
                'slug' => 'field_of_service',
                'short_name'    =>  'Service',
                'description'  =>  'Gérez et planifier vos services.',
                'version'  => 'beta',
                'author'    => 'Koverae',
                'icon'  => 'finance',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => "field-of-service::layouts.navbar-menu",
                'navbar_id' => 11,
                'enabled'   => 1
            ],

            // [
            //     'name' => 'Site Web',
            //     'slug' => 'website',
            //     'short_name'    =>  'Site Web',
            //     'description'  =>  'Créer de magnifique sites web.',
            //     'version'  => 'beta',
            //     'author'    => 'Koverae',
            //     'icon'  => 'website',
            //     'is_default'    => 0,
            //     'link'  => 'main',
            //     'path'  => null,
            //     'navbar_id' => null,
            //     'enabled'   => 1
            // ],

            // [
            //     'name' => "Centre d'aide",
            //     'slug' => 'helpdesk',
            //     'short_name'    =>  "Centre d'aide",
            //     'description'  =>  'Offrez une meilleure assistance à vos clients.',
            //     'version'  => 'beta',
            //     'author'    => 'Koverae',
            //     'icon'  => 'finance',
            //     'is_default'    => 0,
            //     'link'  => 'main',
            //     'path'  => null,
            //     'navbar_id' => null,
            //     'enabled'   => 1
            // ],

        ];

        foreach ($modules as $module) {
            Module::create($module);

        }

    }

}