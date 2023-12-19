<?php

namespace Modules\Invoicing\Entities\Vendor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Invoicing\Database\factories\BillDetailFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'supplier_bill_details';

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function bill() {
        return $this->belongsTo(Bill::class, 'supplier_bill_id', 'id');
    }

}
