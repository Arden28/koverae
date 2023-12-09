<?php

namespace Modules\Purchase\Entities\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Purchase\Database\factories\RequestQuotationDetailFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Purchase\Entities\Request\RequestQuotation;
use Modules\Inventory\Entities\Product;
use Carbon\Carbon;

class RequestQuotationDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function requestQuotation() {
        return $this->belongsTo(RequestQuotation::class, 'request_quotation_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getPriceAttribute($value) {
        return $value / 100;
    }

    public function getUnitPriceAttribute($value) {
        return $value / 100;
    }

    public function getSubTotalAttribute($value) {
        return $value / 100;
    }

    public function getProductDiscountAmountAttribute($value) {
        return $value / 100;
    }

    public function getProductTaxAmountAttribute($value) {
        return $value / 100;
    }
}
