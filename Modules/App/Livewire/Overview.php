<?php

namespace Modules\App\Livewire;

use App\Models\Module\InstalledModule;
use App\Models\Module\Module;
use App\Models\Module\ModuleCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
    public $test;

    public function mount(){
        $this->apps = Module::isNotDefault()->get();
        // Carbon::setLocale('es');
        // $this->test = Carbon::now();
    }

    public function changeCat($slug){
        $this->cat = $slug;
        if($slug == 'all'){
            $this->apps = Module::isNotDefault()->get();
        }else{
            $category = ModuleCategory::where('slug', $slug)->first();
            $this->apps = Module::where('module_category_id', $category->id)->isNotDefault()->get();
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

        $className = getModuleHandlerClass($module->slug);
        if (class_exists($className)) {
            $moduleInstance = new $className();
            // Now you can call any method you need on the instance
            $moduleInstance->install(current_company()->id, Auth::user()->id);
            // Here we'll handle the response of the installation

            return redirect()->route('main', ['subdomain' => current_company()->domain_name]);
        
        } else {
            // Handle the error, perhaps log it or display a message
            Log::error("Module handler class does not exist: " . $className);
        }
    }

    public function uninstall(Module $module){

        $className = getModuleHandlerClass($module->slug);
        if (class_exists($className)) {
            $moduleInstance = new $className();
            // Now you can call any method you need on the instance
            $moduleInstance->uninstall(current_company()->id, Auth::user()->id);
            // Here we'll handle the response of the installation

            return redirect()->route('main', ['subdomain' => current_company()->domain_name]);
        
        } else {
            // Handle the error, perhaps log it or display a message
            Log::error("Module handler class does not exist: " . $className);
        }
    }

}
