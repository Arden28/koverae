<?php

namespace App\Models;

use App\Models\Company\Company;
use App\Models\Company\CompanyUser;
use App\Models\Team\Team;
use App\Traits\HasCompany;
use App\Traits\HasTeam;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Employee\Entities\Employee;
use Modules\Sales\Entities\SalesTeam;
use Modules\Sales\Entities\SalesPerson;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasTeam, HasCompany, InteractsWithMedia;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_logged_in_at', 'created_at', 'updated_at', 'deleted_at'];

    protected $with = ['media'];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/' . md5($this->attributes['email']));
    }

    public function scopeIsActive(Builder $builder) {
        return $builder->where('is_active', 1);
    }

    public function isEmployee(Builder $builder, User $employee) {
        return $builder->where($employee->getRoleNames(),'!=', 'Super Admin');
    }

    // Get Team
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * Get the companies for the user.
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'user_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get the company_user for the user.
     */
    public function company_user()
    {
        return $this->hasOne(CompanyUser::class, 'user_id', 'id');
    }

    /**
     * Get the employee for the user.
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id', 'id');
    }

    public function salesTeams()
    {
        return $this->hasMany(SalesTeam::class, 'team_leader_id', 'id');
    }

    public function seller() {
        return $this->hasOne(SalesPerson::class, 'user_id', 'id');
    }

}
