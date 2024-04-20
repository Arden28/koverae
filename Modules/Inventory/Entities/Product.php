<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\ProductFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Modules\Inventory\Entities\History\InventoryMove;
use Modules\Inventory\Entities\Product\ProductSupplier;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Invoicing\Entities\Tax\Tax;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;
use Modules\Purchase\Entities\PurchaseDetail;
use Modules\Sales\Entities\SalesDetail;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements Buyable, HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $guarded = [];

    // protected $with = ['media'];

    protected $casts = [
        'sale_taxes' => 'array',
        'purchase_taxes' => 'array',
        'taxes' => 'array',
    ];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    // Image
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
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

    // Get Quotation's details
    public function bought() {
        return $this->hasMany(PurchaseDetail::class, 'product_id', 'id');
    }

    public function sold() {
        return $this->hasMany(SalesDetail::class, 'product_id', 'id');
    }

    // public function manufactured() {
    //     return $this->hasMany(SalesDetail::class, 'product_id', 'id');
    // }

    public function moves() {
        return $this->hasMany(InventoryMove::class, 'product_id', 'id');
    }

    public function bom() {
        return $this->hasOne(BillOfMaterial::class, 'product_id', 'id');
    }

    public function unit() {
        return $this->belongsTo(UnitOfMeasure::class, 'uom_id', 'id');
    }

    public function tax() {
        return $this->belongsTo(Tax::class, 'product_order_tax', 'id');
    }

    public function sale_taxes() {
        return $this->belongsToMany(Tax::class, 'sale_taxes', 'id');
    }

    public function suppliers() {
        return $this->hasMany(ProductSupplier::class, 'product_id', 'id');
    }
}
