<?php

namespace Modules\App\Livewire;

use App\Models\Module\InstalledModule;
use App\Models\Module\Module;
use App\Models\Module\ModuleCategory;
use Livewire\Attributes\Url;
use Livewire\Component;
use Modules\App\Services\AppInstallationService;

class Overview extends Component
{
    // #[Url(keep: true)]
    public $cat = 'all';

    public $apps = [];

    public function mount(){
        $this->apps = Module::all();

    }

    public function render()
    {
        // $apps = Module::all();
        $app_categories = ModuleCategory::all();
        return view('app::livewire.overview', compact('app_categories'))
        ->extends('layouts.master');
    }

    public function category($slug){
        $this->cat = $slug;
        // $category = ModuleCategory::where('slug', $slug)->first();
        // $this->apps = Module::where('category_id', $category->id)->get();
    }

    public function install(Module $module){

        $installationService = new AppInstallationService();
        if($module->parent_slug){
            $installationService->installModule($module->parent_slug, current_company()->id);
        }

        // Install Apps
        $installationService->installModule($module->slug, current_company()->id);

        return redirect()->route('main', ['subdomain' => current_company()->domain_name]);
    }

    public function uninstall($module){
        $app = InstalledModule::where('module_slug', $module)->first();
        $app->delete();

        return redirect()->route('main', ['subdomain' => current_company()->domain_name]);
    }
}
