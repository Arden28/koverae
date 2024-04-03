<?php

namespace Modules\Sales\Entities\Price;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sales\Database\factories\PriceListRuleFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceListRule extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // Get Pricelist
    public function priceList() {
        return $this->belongsTo(PriceList::class, 'price_list_id', 'id');
    }

    // protected static function newFactory(): PriceListRuleFactory
    // {
    //     //return PriceListRuleFactory::new();
    // }
}
