<?php

namespace Modules\Manufacturing\Entities\MO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\History\InventoryMove;
use Modules\Inventory\Entities\Operation\OperationType;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Entities\UoM\UnitOfMeasure;
use Modules\Inventory\Entities\Warehouse\Warehouse;
use Modules\Manufacturing\Entities\BOM\BillOfMaterial;
use Modules\Manufacturing\Entities\MO\ManufacturingOrderComponent;
use Modules\Manufacturing\Entities\Unbuild\UnbuildOrder;

class ManufacturingOrder extends Model
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


    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = ManufacturingOrder::isCompany(current_company()->id)->max('id') + 1;
            $prefix = 'MO';
            $warehouse = Warehouse::find($model->operationType->warehouse_id);
            $model->reference = make_reference_with_id($warehouse->short_name, $number, $prefix);
        });
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function bom() {
        return $this->belongsTo(BillOfMaterial::class, 'bom_id', 'id');
    }

    public function contact() {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    public function uom() {
        return $this->belongsTo(UnitOfMeasure::class, 'uom_id', 'id');
    }

    public function operationType() {
        return $this->belongsTo(OperationType::class, 'operation_type_id', 'id');
    }

    public function responsible() {
        return $this->belongsTo(Contact::class, 'responsible_id', 'id');
    }

    public function components() {
        return $this->hasMany(ManufacturingOrderComponent::class, 'mo_id', 'id');
    }

    // Product Moves
    public function moves() {
        return $this->hasMany(InventoryMove::class, 'reference', 'source_document');
    }

    public function unbuild() {
        return $this->hasMany(UnbuildOrder::class, 'mo_id', 'id');
    }

    // protected static function newFactory(): ManufacturingOrderFactory
    // {
    //     //return ManufacturingOrderFactory::new();
    // }
}
