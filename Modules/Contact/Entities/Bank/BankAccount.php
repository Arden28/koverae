<?php

namespace Modules\Contact\Entities\Bank;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Entities\Bank\Bank;
use App\Models\Company\Company;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $table= 'bank_accounts';

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

    // Get Contact
    public function contact() {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    public function bank() {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\ContactBankAccountFactory::new();
    // }
}
