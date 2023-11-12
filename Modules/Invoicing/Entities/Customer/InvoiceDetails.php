<?php

namespace Modules\Invoicing\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Sales\Entities\SalesPerson;

class InvoiceDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customer_invoice_details';

    protected $guarded = [];

    public function sales() {
        return $this->belongsTo(Invoice::class, 'customer_invoice_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Invoicing\Database\factories\InvoiceDetailsFactory::new();
    // }
}
