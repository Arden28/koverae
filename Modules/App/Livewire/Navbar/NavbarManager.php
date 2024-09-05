<?php

namespace Modules\App\Livewire\Navbar;

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
                'name' => 'App Manager',
                'path' => 'app::layouts.navbar-menu',
                'id' => 1,
                'slug' => 'app',
            ],
            2 => [
                'name' => 'Settings',
                'path' => 'settings::layouts.navbar-menu',
                'id' => 2,
                'slug' => 'settings'
            ],
            3 => [
                'name' => 'Dashboards', 
                'path' => 'dashboards::layouts.navbar-menu',
                'id' => 3,
                'slug' => 'dashboards'
            ],
            4 => [
                'name' => 'Contacts',
                'path' => 'contact::layouts.navbar-menu',
                'id' => 4,
                'slug' => 'contact'
            ],
            5 => [
                'name' => 'Invoicing',
                'path' => 'invoicing::layouts.navbar-menu',
                'id' => 5,
                'slug' => 'invoice'
            ],
            6 => [
                'name' => 'Invoicing',
                'path' => 'sales::layouts.navbar-menu',
                'id' => 6,
                'slug' => 'invoice'
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
