<?php

namespace Modules\Inventory\Entities\Warehouse\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\WarehouseLocationFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseLocation extends Model
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

    public function scopeIsWarehouse(Builder $query, $warehouse_id)
    {
        return $query->where('warehouse_id', $warehouse_id);
    }

    public function scopeIsType(Builder $query, $type)
    {
        return $query->where('type', $type);
    }
    public function parent() {
        return $this->belongsTo(WarehouseLocation::class, 'parent_id', 'id');
    }

    public function scopeIsName(Builder $query, $name)
    {
        return $query->where('name', $name);
    }

    // protected static function newFactory(): WarehouseLocationFactory
    // {
    //     //return WarehouseLocationFactory::new();
    // }
}
