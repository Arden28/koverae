<?php

namespace Modules\Sales\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesPayment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the sale payment belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function sale() {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }

    public function setAmountAttribute($value) {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value) {
        return $value / 100;
    }

    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d M, Y');
    }

    public function scopeBySale($query) {
        return $query->where('sale_id', request()->route('sale_id'));
    }
    public function scopeByCompany($query) {
        return $query->where('company_id', request()->route('company_id'));
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Sales\Database\factories\SalesPaymentFactory::new();
    // }
}
