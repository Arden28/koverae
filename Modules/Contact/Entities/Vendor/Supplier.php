<?php

namespace Modules\Contact\Entities\Vendor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Contact\Database\factories\SupplierFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Contact;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Company\Company;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
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


    // protected static function newFactory(): SupplierFactory
    // {
    //     //return SupplierFactory::new();
    // }
}
