<?php

namespace Modules\Pos\Entities\Pos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Database\factories\PosProductCategoryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Product;
use Modules\Pos\Entities\Pos\Pos;

class PosProductCategory extends Model
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

    public function scopeIsPos(Builder $query, $pos_id)
    {
        return $query->where('pos_id', $pos_id);
    }

    // Get Pos
    public function pos() {
        return $this->belongsTo(Pos::class, 'pos_id', 'id');
    }

    // Get Product
    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }


    // protected static function newFactory(): PosProductCategoryFactory
    // {
    //     //return PosProductCategoryFactory::new();
    // }
}
