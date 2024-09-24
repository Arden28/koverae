<?php

namespace Modules\Invoicing\Entities\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTerm extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }
    
    // Payment Term
    public function dueTerms() {
        return $this->hasMany(PaymentDueTerm::class, 'payment_term_id', 'id');
    }
}
