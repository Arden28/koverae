<?php

namespace Modules\Sales\Entities;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;


class SaleTag extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];


    // If the sales belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function sales() {
        return $this->hasMany(Sale::class, 'tag_id', 'id');
    }


    // protected static function newFactory(): SaleTagFactory
    // {
    //     //return SaleTagFactory::new();
    // }
}
