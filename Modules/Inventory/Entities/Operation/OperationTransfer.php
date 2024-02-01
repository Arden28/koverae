<?php

namespace Modules\Inventory\Entities\Operation;

use Carbon\Carbon;
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

    public function scopeIsBelongs(Builder $query, $source_document)
    {
        return $query->where('source_document', $source_document);
    }


    public function scopeIsOperationType(Builder $query, $type_id)
    {
        return $query->where('operation_type_id', $type_id);
    }

    public function scopeIsWating(Builder $query)
    {
        return $query->where('status', 'ready');
    }

    public function scopeIsLate(Builder $query){
        return $query->whereDate('schedule_date', '<', Carbon::now());
    }


    public function operationType() {
        return $this->belongsTo(OperationType::class, 'operation_type_id', 'id');
    }

    // protected static function newFactory(): OperationTransferFactory
    // {
    //     //return OperationTransferFactory::new();
    // }
}
