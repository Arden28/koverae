<?php

namespace Modules\Pos\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Database\factories\ProductComboFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Entities\Product;
use Modules\Pos\Entities\Pos\Pos;

class ProductCombo extends Model
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

    // Get Product
    public function components() {
        return $this->hasMany(ProductComboDetail::class, 'combo_id', 'id');
    }


    // protected static function newFactory(): ProductComboFactory
    // {
    //     //return ProductComboFactory::new();
    // }
}
