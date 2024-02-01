<?php

namespace Database\Seeders;

use App\Models\Module\Module;
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
        $modules = [

            //Accounting
            [
                'name' => 'Comptabilité',
                'slug' => 'finance',
                'short_name'    =>  'Comptabilité',
                'description'  =>  'Ayez plus de contrôle sur les finances de votre entreprise.',
                'app_group' => 'finance',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'invoice',
                'short_name'    =>  'Factures',
                'description'  =>  'Générez et envoyez simplement des factures.',
                'app_group' => 'finance',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'inventory',
                'short_name'    =>  'Inventaire',
                'description'  =>  'Gardez vos stocks et vos opérations logisitiques sous contrôles.',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'barcode',
                'short_name'    =>  'Codes Barres',
                'description'  =>  'Utiliser des lecteurs de codes-barres pour traiter vos opérations logistiques',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'purchase',
                'short_name'    =>  'Achats',
                'description'  =>  'Maîtrisez vos approvisionnements en toute efficacité.',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'manufacturing',
                'short_name'    =>  'Fabrication',
                'description'  =>  'Produisez en toute simplicité et fiabilité',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'quality',
                'short_name'    =>  'Qualité',
                'description'  =>  'Contrôlez la qualité de vos produits',
                'app_group' => 'inventory_manufacture',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'employee',
                'short_name'    =>  'Personnel',
                'description'  =>  'Centraliser les informations sur vos employés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'employee_contract',
                'short_name'    =>  'Contrat',
                'description'  =>  'Gérez les contrats de vos employés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
                'icon'  => 'employee_contract',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            //Employee expenses
            [
                'name' => 'Dépenses',
                'slug' => 'expenses',
                'short_name'    =>  'Dépenses',
                'description'  =>  'Soumettre, valider et rembourser les dépenses des employés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'timeoff',
                'short_name'    =>  'Congés',
                'description'  =>  'Allouer des congés payés et suivre les demandes de congés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'payroll',
                'short_name'    =>  'Paie',
                'description'  =>  'Gérez les fiches de paie de vos employés',
                'app_group' => 'human_resource',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'sales',
                'short_name'    =>  'Ventes',
                'description'  =>  'Enregistrez et gérez vos ventes.',
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'crm',
                'short_name'    =>  'CRM',
                'description'  =>  'Gérez plus efficacement vos clients et opportunités.',
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
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
                'slug' => 'pos',
                'short_name'    =>  'Pdv',
                'description'  =>  'Une interface adaptée pour les magasins et les restaurants',
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
                'icon'  => 'pos',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            // Contact
            [
                'name' => 'Contacts',
                'slug' => 'contact',
                'short_name'    =>  'Contacts',
                'description'  =>  "Centralisez votre carnet d'adresse",
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
                'icon'  => 'contact',
                'is_default'    => 0,
                'link'  => 'contacts.index',
                'path'  => 'contact::layouts.navbar-menu',
                'navbar_id' => null,
                'enabled'   => 1
            ],
            // Subscription
            [
                'name' => 'Abonnements',
                'slug' => 'subscription',
                'short_name'    =>  'Abonnements',
                'description'  =>  "Générez des factures récurrentes et gérez les renouvellements",
                'app_group' => 'sales',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
                'icon'  => 'subscription',
                'is_default'    => 0,
                'link'  => 'main',
                'path'  => null,
                'navbar_id' => null,
                'enabled'   => 1
            ],
            // Dashboard
            [
                'name' => 'Tableaux de bords',
                'slug' => 'dashboards',
                'short_name'    =>  'Tableaux de bords',
                'description'  =>  'Adapter vos rapports à votre entreprise.',
                'version'  => 'beta',
                'author'    => 'Koverae SARL',
                'icon'  => 'finance',
                'is_default'    => 1,
                'link'  => 'dashboards.index',
                'path'  => 'dashboards::layouts.navbar-menu',
                'navbar_id' => 5,
                'enabled'   => 1
            ],

            // [
            //     'name' => 'E-Learning',
            //     'slug' => 'e-learning',
            //     'short_name'    =>  'E-Learning',
            //     'description'  =>  'Créer, Partager et gérez vos formations.',
            //     'version'  => 'beta',
            //     'author'    => 'Koverae SARL',
            //     'icon'  => 'finance',
            //     'is_default'    => 0,
            //     'link'  => 'main',
            //     'path'  => null,
            //     'navbar_id' => null,
            //     'enabled'   => 1
            // ],

            // [
            //     'name' => 'Service',
            //     'slug' => 'field_of_service',
            //     'short_name'    =>  'Service',
            //     'description'  =>  'Gérez et planifier vos services.',
            //     'version'  => 'beta',
            //     'author'    => 'Koverae SARL',
            //     'icon'  => 'finance',
            //     'is_default'    => 0,
            //     'link'  => 'main',
            //     'path'  => null,
            //     'navbar_id' => null,
            //     'enabled'   => 1
            // ],

            // [
            //     'name' => 'Site Web',
            //     'slug' => 'website',
            //     'short_name'    =>  'Site Web',
            //     'description'  =>  'Créer de magnifique sites web.',
            //     'version'  => 'beta',
            //     'author'    => 'Koverae SARL',
            //     'icon'  => 'finance',
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
            //     'author'    => 'Koverae SARL',
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
