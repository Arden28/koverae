<?php

namespace Modules\Invoicing\Entities\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\SalesPerson;

class InvoicePayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'invoice_payments';

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

    public function scopeIsInvoice(Builder $query, $invoice_id)
    {
        return $query->where('customer_invoice_id', $invoice_id);
    }


    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }
}
