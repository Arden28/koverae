<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales_details';
    protected $guarded = [];

    public function sales() {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }


    // protected static function newFactory()
    // {
    //     return \Modules\Sales\Database\factories\SalesDetailFactory::new();
    // }
}
