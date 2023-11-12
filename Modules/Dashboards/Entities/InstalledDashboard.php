<?php

namespace Modules\Dashboards\Entities;

use App\Models\Module\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstalledDashboard extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dash_id',
        'app_dashboard_id',
        'company_id',
    ];

    public function dashboard()
    {
        return $this->belongsTo(Dashboard::class, 'dash_id', 'id');
    }

    public function app_dashboard()
    {
        return $this->belongsTo(AppDashboard::class, 'app_dashboard_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Dashboards\Database\factories\InstalledDashboardFactory::new();
    // }
}
