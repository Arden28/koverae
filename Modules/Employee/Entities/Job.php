<?php

namespace Modules\Employee\Entities;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Database\factories\JobFactory;
use Illuminate\Database\Eloquent\Builder;

class Job extends Model
{
    use HasFactory;

    // protected $fillable = ['company_id', 'department_id', 'job_type_id', 'title', 'description', 'newers'];
    protected $guarded = [];

    protected static function newFactory()
    {
        return JobFactory::new();
    }

    // If the employees belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    /**
     * Get the company for the job.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get the department for the job.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    /**
     * Get the jobType for the job.
     */
    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id', 'id');
    }

    /**
     * Get employees for the job.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_id', 'id');
    }
}
