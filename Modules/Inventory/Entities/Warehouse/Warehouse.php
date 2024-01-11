<?php

namespace Modules\Inventory\Entities\Warehouse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\WarehouseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
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

    public function routes() {
        return $this->hasMany(WarehouseRoute::class, 'warehouse_id', 'id');
    }



    // protected static function newFactory(): WarehouseFactory
    // {
    //     //return WarehouseFactory::new();
    // }
}
