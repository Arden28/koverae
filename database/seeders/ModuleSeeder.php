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
            [
                'name' => 'Finances',
                'slug' => 'finance',
                'short_name'    =>  'Finance',
                'description'  =>  'Ayez plus de contrôle sur les finances de votre entreprise.'
            ],
            [
                'name' => 'Factures',
                'slug' => 'invoice',
                'short_name'    =>  'Finance',
                'description'  =>  'Générez et envoyez simplement des factures.'
            ],
            [
                'name' => 'Inventaire',
                'slug' => 'inventory',
                'short_name'    =>  'Inventaire',
                'description'  =>  'Gardez vos stocks et vos opérations logisitiques sous contrôles.',
            ],

            [
                'name' => 'Achats',
                'slug' => 'purchase',
                'short_name'    =>  'Achats',
                'description'  =>  'Maîtrisez vos approvisionnements en toute efficacité.'
            ],

            [
                'name' => 'Personnel',
                'slug' => 'employee',
                'short_name'    =>  'Personnel',
                'description'  =>  'Gérez votre personnel en toute simplicité.'
            ],
            [
                'name' => 'Ventes',
                'slug' => 'sales',
                'short_name'    =>  'Vente',
                'description'  =>  'Enregistrez et gérez vos ventes.'
            ],

            [
                'name' => 'Relation Clients',
                'slug' => 'crm',
                'short_name'    =>  'CRM',
                'description'  =>  'Gérez plus efficacement vos clients et opportunités.'
            ],

            [
                'name' => 'Point de Vente',
                'slug' => 'pos',
                'short_name'    =>  'PDV',
                'description'  =>  'Développez efficacement votre magasin.'
            ],

            [
                'name' => 'E-Learning',
                'slug' => 'e-learning',
                'short_name'    =>  'E-Learning',
                'description'  =>  'Créer, Partager et gérez vos formations.'
            ],

            [
                'name' => 'Service',
                'slug' => 'field_of_service',
                'short_name'    =>  'Service',
                'description'  =>  'Gérez et planifier vos services.'
            ],

            [
                'name' => 'Contacts',
                'slug' => 'contact',
                'short_name'    =>  'Contacts',
                'description'  =>  'Centralisez votre carnet d\'adresse.'
            ],

            [
                'name' => 'Site Web',
                'slug' => 'website',
                'short_name'    =>  'Site Web',
                'description'  =>  'Créer de magnifique sites web.'
            ],

            [
                'name' => 'Centre d\'aide',
                'slug' => 'helpdesk',
                'short_name'    =>  'Centre d\'aide',
                'description'  =>  'Offrez une meilleure assistance à vos clients.'
            ],

            [
                'name' => 'Tableaux de bords',
                'slug' => 'dashboards',
                'short_name'    =>  'Tableaux de bords',
                'description'  =>  'Adapter vos rapports à votre entreprise.'
            ],

        ];

        foreach ($modules as $module) {
            Module::create($module);

        }

    }

}
