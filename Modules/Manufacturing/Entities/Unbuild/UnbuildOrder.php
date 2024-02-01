<?php

namespace Modules\Manufacturing\Entities\Unbuild;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\History\InventoryMove;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;

class UnbuildOrder extends Model
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

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function bom() {
        return $this->belongsTo(BillOfMaterial::class, 'bom_id', 'id');
    }

    public function responsible() {
        return $this->belongsTo(Contact::class, 'responsible_id', 'id');
    }

    public function uom() {
        return $this->belongsTo(UnitOfMeasure::class, 'uom_id', 'id');
    }

    // Product Moves
    public function moves() {
        return $this->hasMany(InventoryMove::class, 'reference', 'reference');
    }

    // protected static function newFactory(): UnbuildOrderFactory
    // {
    //     //return UnbuildOrderFactory::new();
    // }
}
