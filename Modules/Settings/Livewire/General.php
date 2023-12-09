<?php

namespace Modules\Settings\Livewire;

use App\Models\Module\InstalledModule;
use App\Models\Module\Module;
use App\Models\Team\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class General extends Component
{
    // Invite User
    public $friends_emails;
    // Unit of measure
    public $weight, $volume;

    // Email Digest
    public $digest_available, $digest, $digest_models;

    // Permissions
    public $kover_portal, $kover_portal_type, $can_reset_password, $has_all_rights_access, $can_import_from_xls;

    public $app_id;
    public function editCompany(){
        return redirect()->toRoute('settings.edit-company', navigate: true);
    }


    public function render(Request $request)
    {
        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();

        $page = $request->query('page');

        // Determine which controller method to call based on the 'page' parameter
        if ($page === 'sales') {

            return $this->showPage($page, $team);

        } elseif ($page === 'inventory') {

            return $this->showPage($page, $team);

        } elseif ($page === 'employee') {

            return $this->showPage($page, $team);

        } else {
            // A default method if 'page' doesn't match any specific page
            return view('settings::livewire.general', compact('team'))->layout('layouts.master');
        }



    }

    // Determine which page is shown
    public function showPage($slug, $team){
        return view('settings::livewire.module.'.$slug, compact('team'))->layout('layouts.master');
    }

    // Install a module
    public function installApp(Module $app_id){
        // $team = Team::find(Auth::user()->team->id)->first();
        $team = Team::where('id', Auth::user()->team->id)->where('uuid', Auth::user()->team->uuid)->first();

        // Check if the module is already installed
        if ($app_id->isInstalledBy($team)) {

            toast("L'application {$app_id->name} est déjà installée.", 'info');

            return redirect()->back();
        }

        // Check if a similar InstalledModule exists
        $existingInstalledModule = InstalledModule::where('team_id', Auth::user()->team->id)
            ->where('module_slug', $app_id->slug)
            ->first();

        if ($existingInstalledModule) {
            // An existing installed module with similar values already exists
            // You can handle this situation as needed
            notify()->error("Cette application est déjà installée pour votre entreprise.");
        }

        // Install the module
        $installedModule = new InstalledModule([
            'team_id' => Auth::user()->team->id,
            'module_slug' => $app_id->slug,
        ]);
        $installedapp_id->save();

        // if ($team->currentTeam) {
        //     $installedapp_id->team_id = $team->currentTeam->id;
        // }

        // $installedapp_id->save();

        // Redirect back to the modules page with a success message
            notify()->error("L'application {$app_id->name} installée avec brio.");
    }


}
