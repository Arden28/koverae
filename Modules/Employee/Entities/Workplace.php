<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Database\factories\WorkplaceFactory;
use Illuminate\Database\Eloquent\Builder;

class Workplace extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'icon', 'company_id'];


    // If the uemployees belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    protected static function newFactory()
    {
        return WorkplaceFactory::new();
    }
}
