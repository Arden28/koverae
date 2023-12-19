<?php

namespace Modules\Contact\Entities;

use App\Models\Company\Company;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Localization\Country;

class Contact extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $guarded = [];

    /* --- Searchable field --- */

    protected $searchable = [
        'name',
        'email',
        'phone',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tags' => 'array',
    ];

    // If the contacts belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // If the contacts belong to the company
    public function scopeIsSupplier(Builder $query)
    {
        return $query->where('is_supplier', true);
    }

    // If the contacts belong to the company
    public function scopeIsCustomer(Builder $query)
    {
        return $query->where('is_customer', true);
    }

    // Get Company
    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // Get Country
    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    // Get Contact Adress
    public function contactAddress() {
        return $this->hasMany(ContactAdress::class, 'contact_id', 'id');
    }

    // Get Bank Accounts
    public function bankAccounts() {
        return $this->hasMany(BankAccount::class, 'contact_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\ContactFactory::new();
    // }
}
