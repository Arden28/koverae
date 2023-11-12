<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team\Team;
use Modules\Dashboards\Entities\AppDashboard;

class Module extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'icon',
        'name',
        'slug',
        'short_name',
        'description',
        'enabled'
    ];


    public function teams()
    {
        return $this->belongsToMany(Team::class, 'installed_modules', 'module_slug', 'team_id');
    }


    public function install(Team $team)
    {
        if (!$this->enabled) {
            throw new \RuntimeException("L'application est désactivée. Il est impossible de l'installer.");
        }

        $team->modules()->attach($this->slug);
        InstalledModule::create([
            'team_id'   => $team->id,
        ]);
    }

    public function uninstall(Team $team)
    {
        $team->modules()->detach($this->slug);
    }

    public function isInstalledBy(Team $team)
    {
        return InstalledModule::where('module_slug', $this->slug)
            ->where('team_id', $team->id)
            ->first();
    }

    public function installed_modules(){
        return $this->hasMany(InstalledModule::class, 'module_slug', 'slug');
    }

    public function module_users(){
        return $this->hasMany(ModuleUser::class, 'module_slug', 'slug');
    }

    // App Dashboards
    public function dashboards(){
        return $this->hasMany(AppDashboard::class, 'app_id', 'id');
    }
    // public function isInstalledBy(Team $team)
    // {
    //     return $this->teams()->exists();
    // }
}
