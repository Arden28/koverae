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
                'slug' => 'crm'
            ],
            10 => [
                'name' => 'Abonnement',
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 10,
                'slug' => 'subscription'
            ],
            11 => [
                'name' => 'Service sur terrain',
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 11,
                'slug' => 'field_of_service'
            ],
            12 => [
                'name' => 'Location',
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 12,
                'slug' => 'rental'
            ],
            13 => [
                'name' => 'Projet', //inclus également les feuilles de temps
                'path' => 'invoicing::layouts.navbar-menu',
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
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 15,
                'slug' => 'attendances'
            ],
            16 => [
                'name' => 'Dépense employés',
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 16,
                'slug' => 'expenses'
            ],
            17 => [
                'name' => 'Abonnement',
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 17,
                'slug' => 'subscription'
            ],
            18 => [
                'name' => 'Sondage',
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 18,
                'slug' => 'survey'
            ],
        ];

        // Set the navbar based on the menu variable
        $this->navbar = $navbarMapping[$menu] ?? abort(404);
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
