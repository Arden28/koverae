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
    function dashboard($slug) {

        // $app_dashboard = AppDashboard::where('name', $name)->first();
        // $dashboard = Dashboard::find($dash->dash_id)->first();
        $app_dashboard = AppDashboard::isCompany(current_company()->id)->findBySlug($slug)->first();
        $company = Company::find(current_company()->id)->first();

        if(!$app_dashboard->isInstalledBy($company)){
            return $app_dashboard->isInstalledBy($company);
        }
    }
}
