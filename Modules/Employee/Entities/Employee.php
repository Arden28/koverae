<?php

namespace Modules\Employee\Entities;

use App\Models\Company\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Database\factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Builder;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = [];
    // protected $fillable = ['name', 'phone', 'mobile', 'email', 'company_id', 'user_id', 'department_id', 'date_of_hire', 'job_id', 'manager_id', 'street', 'street2', 'city', 'zip', 'state', 'country', 'personal_email', 'personal_phone', 'bank_account_id', 'language', 'marital_status', 'children_no', 'contact_name, contact_phone', 'certificate_level', 'study_field', 'school_study', 'visa_no', 'work_permit_no', 'visa_expiration_date', 'work_permit_expiration_date', 'nationality', 'national_id', 'passport_no', 'gender', 'birthday', 'birth_place', 'country_birth', 'is_resident'];


    protected static function newFactory()
    {
        return EmployeeFactory::new();
    }

    // If the uemployees belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // Get User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the company for the department.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get the manager of the employee.
     */
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id', 'id');
    }

    /**
     * Get the manager of the employee.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }

    /**
     * Get the department for the employee.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    /**
     * Get the department for the employee.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

}
