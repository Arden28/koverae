<?php

namespace Modules\Inventory\Entities\Operation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\OperationTransferDetailFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Product;

class OperationTransferDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    // protected static function newFactory(): OperationTransferDetailFactory
    // {
    //     //return OperationTransferDetailFactory::new();
    // }
}
