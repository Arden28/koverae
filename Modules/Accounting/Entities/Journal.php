<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the sales belong to the company
    public function scopeIsActive(Builder $query)
    {
        return $query->where('status', '<>', 'inactive');
    }

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }


    // protected static function newFactory()
    // {
    //     return \Modules\Accounting\Database\factories\JournalFactory::new();
    // }
}
