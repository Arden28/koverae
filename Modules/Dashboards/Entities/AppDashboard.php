<?php

namespace Modules\Dashboards\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppDashboard extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'dash_id', 'app_id', 'is_enable'];


    // Get the dashboard in which belongs the app_dashboard.
    public function dashboard(){
        return $this->belongsTo(Dashboard::class, 'dash_id');
    }

    public function isInstalledBy(Dashboard $dash)
    {
        return InstalledDashboard::where('app_dashboard_id', $this->app_dashboard_id)
            ->where('dash_id', $dash->id)
            ->first();
    }

    // protected static function newFactory()
    // {
    //     return AppDashboardFactory::new();
    // }
}
