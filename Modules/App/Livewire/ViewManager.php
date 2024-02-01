<?php

namespace Modules\App\Livewire;

use Livewire\Component;

class ViewManager extends Component
{
    public $navbar;

    public function mount($menu = null)
    {
        // Map the menu variable to corresponding navbar components
        $navbarMapping = [
            'purchase' => [
                'name' => 'Purchase Navbar',
                'path' => 'purchase::layouts.navbar-menu',
                'id' => 1,
            ],
            'sale' => [
                'name' => 'Sale Navbar',
                'path' => 'sales::layouts.navbar-menu',
                'id' => 2,
            ],
            'contact' => [
                'name' => 'Contact Navbar',
                'path' => 'contact::layouts.navbar-menu',
                'id' => 3,
            ],
            'inventory' => [
                'name' => 'Inventory Navbar',
                'path' => 'inventory::layouts.navbar-menu',
                'id' => 4,
            ],
        ];

        // Set the navbar based on the menu variable
        $this->navbar = $navbarMapping[$menu] ?? null;
    }

    // public function loadNavbar($navbar)
    // {
    //     $this->navbar = $navbar;
    // }

    public function render()
    {
        return view('app::livewire.view-manager');
    }
}
