<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Database\factories\JobTypeFactory;
use Illuminate\Database\Eloquent\Builder;

class JobType extends Model
{
    use HasFactory;

    // protected $fillable = ['company_id', 'title'];
    protected $guarded = [];

    protected static function newFactory()
    {
        return JobTypeFactory::new();
    }

    // If the jobType belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }
}
