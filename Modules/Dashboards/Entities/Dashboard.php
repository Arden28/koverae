<?php

namespace Modules\Dashboards\Entities;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Dashboards\Database\factories\DashboardFactory;
use Illuminate\Database\Eloquent\Builder;

class Dashboard extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function scopeIsCompany(Builder $query, $company_id)
    // {
    //     return $query->where('company_id', $company_id);
    // }

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function scopeFindBySlug(Builder $query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopeIsEnabled(Builder $query)
    {
        return $query->where('is_enable', true);
    }

    protected static function newFactory()
    {
        return DashboardFactory::new();
    }

    /**
     * Get the company for the dashboard.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // Get the app_dashboard belongs to the dashboard.
    public function appDashboards(){
        return $this->hasMany(AppDashboard::class, 'dash_id', 'id');
    }

    // Get the app_dashboard installed belongs to the dashboard
    public function installed_dashboards(){
        return $this->hasMany(InstalledDashboard::class, 'parent_slug', 'slug');
    }
}
