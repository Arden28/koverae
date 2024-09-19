<?php

namespace App\Models\Company;

use App\Traits\HasTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Abstracts\Company as CompanyModel;
use App\Models\Module\Module;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Modules\App\Entities\Languages\Language;
use Modules\Contact\Entities\Localization\Country;
use Modules\Dashboards\Entities\Dashboard;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Job;
use Modules\Inventory\Entities\Warehouse\Warehouse;
use Modules\Sales\Entities\SalesPerson;
use Modules\Settings\Entities\Setting;
// use Modules\Pos\Traits\HasPos;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends CompanyModel implements HasMedia
{
    use HasTeam, Notifiable, InteractsWithMedia;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $connection = 'mysql';
    public $table = 'companies';

    protected $guarded = [];

    protected $with = ['media'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/' . md5($this->attributes['name']));
    }

    public function isActive(Builder $builder) {
        return $builder->where('enabled', 1);
    }


    public function modules()
    {
        return $this->belongsToMany(Module::class, 'installed_modules', 'module_slug', 'team_id');
    }

    /**
     * Get settings for the company.
     */
    public function setting()
    {
        return $this->hasOne(Setting::class, 'company_id', 'id');
    }

    /**
     * Get user for the company.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }


    /**
     * Get employees for the company.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }

    /**
     * Get dashboards for the company.
     */
    public function dashboards()
    {
        return $this->hasMany(Dashboard::class, 'company_id', 'id');
    }

    /**
     * Get departments for the job.
     */
    public function departments()
    {
        return $this->hasMany(Department::class, 'company_id', 'id');
    }

    /**
     * Get jobs for the company.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id', 'id');
    }

    /**
     * Get jobs for the company.
     */
    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'company_id', 'id');
    }

    /**
     * Get Countries.
     */
    public function countries()
    {
        return $this->hasMany(Country::class, 'company_id', 'id');
    }

    /**
     * Get Languages.
     */
    public function languages()
    {
        return $this->hasMany(Language::class, 'company_id', 'id');
    }

    /**
     * Get Languages.
     */
    public function sellers()
    {
        return $this->hasMany(SalesPerson::class, 'company_id', 'id');
    }

}
