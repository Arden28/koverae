<?php

namespace Modules\Contact\Entities\Bank;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Bank\BankAccount;
use App\Models\Company\Company;

class Bank extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the banks belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // Get Company
    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }


    // Get Bank Accounts
    public function bankAccounts() {
        return $this->hasMany(BankAccount::class, 'bank_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\BankFactory::new();
    // }
}
