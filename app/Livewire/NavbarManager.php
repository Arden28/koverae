<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class NavbarManager extends Component
{
    public $navbar;

    #[Url(keep: true)]
    public $menu;

    public function mount($menu = null)
    {
        // Map the menu variable to corresponding navbar components
        $navbarMapping = [
            1 => [
                'name' => 'Achat',
                'path' => 'purchase::layouts.navbar-menu',
                'id' => 1,
                'slug' => 'purchase',
            ],
            2 => [
                'name' => 'Vente',
                'path' => 'sales::layouts.navbar-menu',
                'id' => 2,
                'slug' => 'sale'
            ],
            3 => [
                'name' => "Carnet d'addresse",
                'path' => 'contact::layouts.navbar-menu',
                'id' => 3,
                'slug' => 'contact'
            ],
            4 => [
                'name' => 'Gestion de stock',
                'path' => 'inventory::layouts.navbar-menu',
                'id' => 4,
                'slug' => 'inventory'
            ],
            5 => [
                'name' => 'Tableaux de bord',
                'path' => 'dashboards::layouts.navbar-menu',
                'id' => 5,
                'slug' => 'dashboards'
            ],
            6 => [
                'name' => 'Personnel',
                'path' => 'employee::layouts.navbar-menu',
                'id' => 6,
                'slug' => 'employee'
            ],
            7 => [
                'name' => 'Point de vente',
                'path' => 'pos::layouts.navbar-menu',
                'id' => 7,
                'slug' => 'pos'
            ],
            8 => [
                'name' => 'CRM',
                'path' => 'crm::layouts.navbar-menu',
                'id' => 8,
                'slug' => 'crm'
            ],
            9 => [
                'name' => 'Facturation',
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 9,
                'slug' => 'invoicing'
            ],
            10 => [
                'name' => 'Abonnement',
                'path' => 'subscription::layouts.navbar-menu',
                'id' => 10,
                'slug' => 'subscription'
            ],
            11 => [
                'name' => 'Service sur terrain',
                'path' => 'field-of-service::layouts.navbar-menu',
                'id' => 11,
                'slug' => 'field_of_service'
            ],
            12 => [
                'name' => 'Location',
                'path' => 'rental::layouts.navbar-menu',
                'id' => 12,
                'slug' => 'rental'
            ],
            13 => [
                'name' => 'Projet', //inclus également les feuilles de temps
                'path' => 'project::layouts.navbar-menu',
                'id' => 13,
                'slug' => 'project'
            ],
            14 => [
                'name' => 'Fabrication',
                'path' => 'manufacturing::layouts.navbar-menu',
                'id' => 14,
                'slug' => 'manufacturing'
            ],
            15 => [
                'name' => 'Présences',
                'path' => 'attendances::layouts.navbar-menu',
                'id' => 15,
                'slug' => 'attendances'
            ],
            16 => [
                'name' => 'Dépense employés',
                'path' => 'expenses::layouts.navbar-menu',
                'id' => 16,
                'slug' => 'expenses'
            ],
            17 => [
                'name' => 'Abonnement',
                'path' => 'subscription::layouts.navbar-menu',
                'id' => 17,
                'slug' => 'subscription'
            ],
            18 => [
                'name' => 'Sondage',
                'path' => 'survey::layouts.navbar-menu',
                'id' => 18,
                'slug' => 'survey'
            ],
            19 => [
                'name' => 'Paramètres',
                'path' => 'settings::layouts.navbar-menu',
                'id' => 19,
                'slug' => 'settings'
            ],
            20 => [
                'name' => 'Tâches',
                'path' => 'task::layouts.navbar-menu',
                'id' => 20,
                'slug' => 'task'
            ],
            21 => [
                'name' => 'Application',
                'path' => 'app::layouts.navbar-menu',
                'id' => 21,
                'slug' => 'apps'
            ],
            22 => [
                'name' => 'HomePage',
                'path' => 'layouts.navbar-menu',
                'id' => 22,
                'slug' => 'apps'
            ],
        ];

        // Set the navbar based on the menu variable
        if(session()->has('current_menu')){
            $menu = session('current_menu');
        }
        $this->menu = $menu;
        $this->navbar = $navbarMapping[$this->menu] ?? abort(404);
        $this->menu = $this->navbar['id'];
    }

    public function render()
    {
        // Check if the view exists before rendering it
        $viewPath = $this->navbar['path'];
        if (!view()->exists($viewPath)) {
            $viewPath = 'livewire.navbar.default';
        }

        return view($viewPath);
    }
}
