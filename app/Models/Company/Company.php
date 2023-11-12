<?php

namespace App\Models\Company;

use App\Traits\HasTeam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Abstracts\Company as CompanyModel;
use Illuminate\Database\Eloquent\Builder;
use Modules\Dashboards\Entities\Dashboard;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Job;
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
    protected $fillable = [
        'name',
        'user_id',
        'personal_company',
        'enabled'
    ];

    protected $with = ['media'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/' . md5($this->attributes['name']));
    }

    public function isActive(Builder $builder) {
        return $builder->where('enabled', 1);
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

}
