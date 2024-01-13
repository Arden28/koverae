<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Invoicing\Entities\Customer\Invoice;
use Modules\Sales\Entities\Quotation\Quotation;
use App\Models\Company\Company;
use Modules\Inventory\Entities\Operation\OperationTransfer;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the sales belong to the company
    public function scopeIsActive(Builder $query)
    {
        return $query->where('status', '<>', 'canceled');
    }

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function scopeIsQuotation(Builder $query, $quotation_id)
    {
        return $query->where('quotation_id', $quotation_id);
    }

    // Get seller
    public function quotation() {
        return $this->belongsTo(Quotation::class, 'quotation_id', 'id');
    }

    // public function scopeHasInvoices(Builder $query)
    // {
    //     $invoices = $this->invoices();
    //     return $invoices;
    // }

    // Get seller
    public function seller() {
        return $this->belongsTo(SalesPerson::class, 'seller_id', 'id');
    }

    // Get seller
    public function salesTeam() {
        return $this->belongsTo(SalesTeam::class, 'sales_team_id', 'id');
    }

    // Get Quotation's details
    public function saleDetails() {
        return $this->hasMany(SalesDetail::class, 'sale_id', 'id');
    }

    // Get Quotation's details
    public function invoice() {
        return $this->hasOne(Invoice::class, 'sale_id', 'id');
    }

    // Get Quotation's details
    public function transfers() {
        return $this->hasMany(OperationTransfer::class, 'source_document', 'reference');
    }

    public function tags() {
        return $this->belongsToMany(SaleTag::class, 'tag_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Sale::max('id') + 1;
            $model->reference = make_reference_id('SL', $number);
        });
    }

    public function scopeCompleted($query) {
        return $query->where('status', 'Completed');
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
    //     return \Modules\Sales\Database\factories\SaleFactory::new();
    // }
}
