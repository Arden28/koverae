<?php

namespace Modules\Inventory\Entities\Adjustment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\ScrapOrderFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\History\InventoryMove;
use Modules\Inventory\Entities\Product;

class ScrapOrder extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = ScrapOrder::max('id') + 1;
            $model->reference = make_reference_id('SP', $number);
        });
    }

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // Product Moves
    public function moves() {
        return $this->hasMany(InventoryMove::class, 'reference', 'source_document');
    }


    // protected static function newFactory(): ScrapOrderFactory
    // {
    //     //return ScrapOrderFactory::new();
    // }
}
