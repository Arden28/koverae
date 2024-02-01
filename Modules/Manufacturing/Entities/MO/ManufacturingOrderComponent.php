<?php

namespace Modules\Manufacturing\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Product;
use Modules\Manufacturing\Entities\MO\ManufacturingOrder;

class ManufacturingOrderComponent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function mo() {
        return $this->belongsTo(ManufacturingOrder::class, 'mo_id', 'id');
    }

    // protected static function newFactory(): ManufacturingOrderComponentFactory
    // {
    //     //return ManufacturingOrderComponentFactory::new();
    // }
}
