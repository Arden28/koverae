<?php

namespace Modules\Contact\Entities;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class HonorificTitle extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the banks belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // Get Company
    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\HonorificTitleFactory::new();
    // }
}
