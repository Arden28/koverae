<?php

namespace Modules\Invoicing\Entities\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Invoicing\Database\factories\BillPaymentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillPayment extends Model
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

    public function scopeIsBill(Builder $query, $invoice_id)
    {
        return $query->where('supplier_bill_id', $invoice_id);
    }


    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }



    // protected static function newFactory(): BillPaymentFactory
    // {
    //     //return BillPaymentFactory::new();
    // }
}
