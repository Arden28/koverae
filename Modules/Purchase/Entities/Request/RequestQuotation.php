<?php

namespace Modules\Purchase\Entities\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Purchase\Database\factories\RequestQuotationFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Purchase\Entities\Request\RequestQuotationDetail;
use Carbon\Carbon;
use Modules\Contact\Entities\Vendor\Supplier;

class RequestQuotation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    // If the sales belong to the company
    public function scopeIsActive(Builder $query)
    {
        return $query->where('status', '<>', 'canceled');
    }


    // If the uemployees belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // Get Quotation's details
    public function RequestQuotationDetails() {
        return $this->hasMany(RequestQuotationDetail::class, 'request_quotation_id', 'id');
    }

    // Get Quotation's details
    public function purchase() {
        return $this->hasOne(RequestQuotation::class, 'request_quotation_id', 'id');
    }

    // Get seller
    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = RequestQuotation::isCompany(current_company()->id)->max('id') + 1;
            $model->reference = make_reference_id('PO', $number);
        });
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d M, Y');
    }

    public function getShippingAmountAttribute($value) {
        return $value / 100;
    }

    public function getPaidAmountAttribute($value) {
        return $value / 100;
    }

    public function getTotalAmountAttribute($value) {
        return $value / 100;
    }

    public function getDueAmountAttribute($value) {
        return $value / 100;
    }

    public function getTaxAmountAttribute($value) {
        return $value / 100;
    }

    public function getDiscountAmountAttribute($value) {
        return $value / 100;
    }

    // protected static function newFactory(): RequestQuotationFactory
    // {
    //     //return RequestQuotationFactory::new();
    // }
}
