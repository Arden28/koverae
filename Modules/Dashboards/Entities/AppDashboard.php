<?php

namespace Modules\Dashboards\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Company\Company;

class AppDashboard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFindBySlug(Builder $query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // Get the dashboard in which belongs the app_dashboard.
    public function dashboard(){
        return $this->belongsTo(Dashboard::class, 'dash_id');
    }

    // public function isInstalledBy(Dashboard $dash)
    // {
    //     return InstalledDashboard::where('app_dashboard_id', $this->app_dashboard_id)
    //         ->where('dash_id', $dash->id)
    //         ->first();
    // }

    public function isInstalledBy(Company $company)
    {
        return InstalledDashboard::where('slug', $this->slug)
            ->where('company_id', $company->id)
            ->first();
    }


    // protected static function newFactory()
    // {
    //     return AppDashboardFactory::new();
    // }
}
