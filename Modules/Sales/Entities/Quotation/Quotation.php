<?php

namespace Modules\Sales\Entities\Quotation;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sales\Entities\Quotation\QuotationDetails;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesPerson;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

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
    public function quotationDetails() {
        return $this->hasMany(QuotationDetails::class, 'quotation_id', 'id');
    }

    // Get Quotation's details
    public function sale() {
        return $this->hasOne(Sale::class, 'quotation_id', 'id');
    }

    // Get seller
    public function seller() {
        return $this->belongsTo(SalesPerson::class, 'seller_id', 'id');
    }
    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Quotation::isCompany(current_company()->id)->max('id') + 1;
            $model->reference = make_reference_id('QT', $number);
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

    // protected static function newFactory()
    // {
    //     return \Modules\Sales\Database\factories\Quotation/QuotationFactory::new();
    // }
}
