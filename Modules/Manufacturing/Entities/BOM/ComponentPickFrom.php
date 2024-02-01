<?php

namespace Modules\Manufacturing\Entities\BOM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Manufacturing\Database\factories\ComponentPickFromFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation;

class ComponentPickFrom extends Model
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

    public function component() {
        return $this->belongsTo(Product::class, 'component_id', 'id');
    }

    public function uom() {
        return $this->belongsTo(UnitOfMeasure::class, 'uom_id', 'id');
    }

    public function location() {
        return $this->belongsTo(WarehouseLocation::class, 'location_id', 'id');
    }

    // protected static function newFactory(): ComponentPickFromFactory
    // {
    //     //return ComponentPickFromFactory::new();
    // }
}
