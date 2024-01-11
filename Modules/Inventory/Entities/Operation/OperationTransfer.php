<?php

namespace Modules\Inventory\Entities\Operation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\OperationTransferFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Warehouse\Warehouse;

class OperationTransfer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = OperationTransfer::max('id') + 1;
            $prefix = $model->operationType->prefix;
            $warehouse = Warehouse::find($model->operationType->warehouse_id);
            $model->reference = make_reference_with_id($warehouse->short_name, $number, $prefix);
        });
    }

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function scopeIsWating(Builder $query)
    {
        return $query->where('status', 'waiting');
    }


    public function operationType() {
        return $this->belongsTo(OperationType::class, 'operation_type_id', 'id');
    }

    // protected static function newFactory(): OperationTransferFactory
    // {
    //     //return OperationTransferFactory::new();
    // }
}
