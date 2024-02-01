<?php

namespace Modules\Manufacturing\Entities\BOM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Product;

class BillOfMaterialComponent extends Model
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

    public function bom() {
        return $this->belongsTo(BillOfMaterial::class, 'bom_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // protected static function newFactory(): BillOfMaterialComponentFactory
    // {
    //     //return BillOfMaterialComponentFactory::new();
    // }
}
