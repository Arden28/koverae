<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
    use HasFactory;

    protected $fillable =  [
    'company_id',
    'product_name',
    'product_description',
    'product_code',
    'product_barcode_symbology',
    'product_quantity',
    'product_cost',
    'product_price',
    'product_unit',
    'product_stock_alert',
    'product_order_tax',
    'product_tax_type',
    'product_note'];

    protected $guarded = [];

    // protected $with = ['media'];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    // Cart
    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->name;
    }

    public function getBuyablePrice($options = null) {
        return $this->price;
    }

}
