<?php

namespace Modules\Inventory\Entities\Operation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\OperationTypeFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Warehouse\Warehouse;

class OperationType extends Model
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

    public function scopeIsType(Builder $query, $operation_type)
    {
        return $query->where('operation_type', $operation_type);
    }
    public function warehouse() {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }

    public function operationTransfers() {
        return $this->hasMany(OperationTransfer::class, 'operation_type_id', 'id');
    }

    // protected static function newFactory(): OperationTypeFactory
    // {
    //     //return OperationTypeFactory::new();
    // }
}
