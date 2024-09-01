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
    // #[Url(as: 'cat', keep: true)]
    
    public $cat = 'all';
    
    public $industry = 'all';
    public $apps = [];


    public function changeCat($slug){
        $this->cat = $slug;
        if($slug == 'all'){
            $this->apps = Module::all();
        }else{
            $category = ModuleCategory::where('slug', $slug)->first();
            $this->apps = Module::where('module_category_id', $category->id)->get();
        }
    }

    public function changeIndustry($slug){
        $this->industry = $slug;
    }


    public function render()
    {
        $industry_categories = ModuleCategory::isIndustry()->get();
        $app_categories = ModuleCategory::isApp()->get();
        return view('app::livewire.overview', compact('app_categories', 'industry_categories'))
        ->extends('layouts.master');
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

    public function uninstall($moduleSlug){
        $uninstallationService = new AppInstallationService();
        $uninstallationService->uninstallModule($moduleSlug);
        // $app = InstalledModule::where('module_slug', $module)->first();
        // $app->delete();

        return redirect()->route('main', ['subdomain' => current_company()->domain_name]);
    }
}
