<?php

namespace Modules\Employee\Entities;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = ['name', 'description', 'head_id', 'parent_id', 'company_id'];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    protected static function newFactory()
    {
        return \Modules\Employee\Database\factories\DepartmentFactory::new();
    }

    /**
     * Get the company for the department.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get the employees for the department.
     */
    public function childDepartments()
    {
        return $this->hasMany(Department::class, 'parent_id', 'id');
    }

    /**
     * Get the employees for the department.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }

    /**
     * Get the jobs for the department.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'department_id', 'id');
    }

}
