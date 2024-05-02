<?php

namespace Modules\Inventory\Entities\Product\Variant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Database\factories\AttributeValueFactory;

class AttributeValue extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function scopeIsAttrinute(Builder $query, $attribute_id)
    {
        return $query->where('attribute_id', $attribute_id);
    }

    public function attribute() {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }

    // protected static function newFactory(): AttributeValueFactory
    // {
    //     //return AttributeValueFactory::new();
    // }
}
