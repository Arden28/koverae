<?php

namespace Modules\Inventory\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Product;

class ProductSupplier extends Model
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

    public function scopeIsProduct(Builder $query, $product_id)
    {
        return $query->where('product_id', $product_id);
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
