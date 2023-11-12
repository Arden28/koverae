<?php

use App\Models\Company\Company;
use App\Models\Module\InstalledModule;
use App\Models\Module\Module;
use App\Models\Team\Team;
use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanSubscription;
use Illuminate\Support\Facades\Auth;
use Modules\Dashboards\Entities\AppDashboard;
use Modules\Dashboards\Entities\Dashboard;

if (!function_exists('dashboard')) {
    function dashboard($dash) {

        // $app_dashboard = AppDashboard::where('name', $name)->first();
        $dashboard = Dashboard::find($dash->dash_id)->first();

        if($dash->isInstalledBy($dashboard)){
            return $dash->isInstalledBy($dashboard);
        }
    }
}
