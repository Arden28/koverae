<?php

namespace Modules\Invoicing\Entities\Vendor;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Invoicing\Database\factories\BillFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Employee\Entities\Employee;

class Bill extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'supplier_bills';

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    // If the sales belong to the company
    public function scopeIsActive(Builder $query)
    {
        return $query->where('status', '<>', 'canceled');
    }

    public function scopeIsPurchase(Builder $query, $sale_id)
    {
        return $query->where('purchase_id', $sale_id);
    }

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function billDetails() {
        return $this->hasMany(BillDetail::class, 'supplier_bill_id', 'id');
    }

    // Get seller
    public function buyer() {
        return $this->belongsTo(Employee::class, 'buyer_id', 'id');
    }

    public function scopeCompleted($query) {
        return $query->where('status', 'Completed');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Bill::isCompany(current_company()->id)->max('id') + 1;
            $year = Carbon::parse($model->date)->year;
            $month = Carbon::parse($model->date)->month;
            $model->reference = make_reference_with_month_id('Bill', $number, $year, $month);
        });
    }

    // protected static function newFactory(): BillFactory
    // {
    //     //return BillFactory::new();
    // }
}
