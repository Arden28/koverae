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

    protected $fillable = ['name', 'slug', 'company_id', 'is_enable'];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
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
    public function appDashboard(){
        return $this->hasMany(AppDashboard::class, 'dash_id');
    }

    // Get the app_dashboard installed belongs to the dashboard
    public function installed_dashboards(){
        return $this->hasMany(InstalledDashboard::class, 'dash_id', 'id');
    }
}
