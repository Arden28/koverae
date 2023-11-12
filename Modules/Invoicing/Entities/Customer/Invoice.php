<?php

namespace Modules\Invoicing\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\SalesPerson;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customer_invoices';

    protected $guarded = [];

    // If the sales belong to the company
    public function scopeIsActive(Builder $query)
    {
        return $query->where('status', '<>', 'canceled');
    }

    public function scopeIsSale(Builder $query, $sale_id)
    {
        return $query->where('sale_id', $sale_id);
    }

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function invoiceDetails() {
        return $this->hasMany(InvoiceDetails::class, 'customer_invoice_id', 'id');
    }

    // Get seller
    public function seller() {
        return $this->belongsTo(SalesPerson::class, 'seller_id', 'id');
    }

    // public static function boot() {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $number = Invoice::max('id') + 1;
    //         $model->reference = make_reference_id('INV', $number);
    //     });
    // }

    public function scopeCompleted($query) {
        return $query->where('status', 'Completed');
    }


    // protected static function newFactory()
    // {
    //     return \Modules\Invoicing\Database\factories\Customer/InvoiceFactory::new();
    // }
}
