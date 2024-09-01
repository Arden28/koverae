<?php

namespace App\Models\Module;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team\Team;
use Illuminate\Database\Eloquent\Builder;
use Modules\Dashboards\Entities\AppDashboard;
use Modules\Dashboards\Entities\InstalledDashboard;

class Module extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];


    public function scopeFindBySlug(Builder $query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'installed_modules', 'module_slug', 'team_id');
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'installed_modules', 'module_slug', 'company_id');
    }


    public function install(Company $company)
    {
        if (!$this->enabled) {
            throw new \RuntimeException("L'application est désactivée. Il est impossible de l'installer.");
        }

        $company->modules()->attach($this->slug);
        InstalledModule::create([
            'company_id'   => $company->id,
        ]);
    }

    // public function uninstall(Team $team)
    // {
    //     $team->modules()->detach($this->slug);
    // }

    public function uninstall(Company $company)
    {
        $company->modules()->detach($this->slug);
    }

    public function isInstalledBy(Company $company)
    {
        return InstalledModule::where('module_slug', $this->slug)
            ->where('company_id', $company->id)
            ->first();
    }

    public function installed_modules(){
        return $this->hasMany(InstalledModule::class, 'module_slug', 'slug');
    }

    public function module_users(){
        return $this->hasMany(ModuleUser::class, 'module_slug', 'slug');
    }

    // Parent App
    public function parent(){
        return $this->belongsTo(Module::class, 'parent_slug', 'slug');
    }

    // App Dashboards
    public function dashboards(){
        return $this->hasMany(AppDashboard::class, 'app_id', 'id');
    }

    public function installed_dashboards(){
        return $this->hasMany(InstalledDashboard::class, 'module_slug', 'slug');
    }
    // public function isInstalledBy(Team $team)
    // {
    //     return $this->teams()->exists();
    // }
}
