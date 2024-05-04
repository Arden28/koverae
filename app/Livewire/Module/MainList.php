<?php

namespace App\Livewire\Module;

use App\Models\Module\Module;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class MainList extends Component
{
    public function render()
    {
        $modules = modules();
        return view('livewire.module.main-list', compact('modules'));
    }

    public function openApp(Module $module){
        // Retrieve the current array from the cache

        update_menu($module->navbar_id);

        return redirect()->route($module->link, ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }
}
