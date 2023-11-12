<?php

namespace Modules\Contact\Entities\Localization;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the tag belong to the company
    // public function scopeIsCompany(Builder $query, $company_id)
    // {
    //     return $query->where('company_id', $company_id);
    // }

    // Get Company
    // public function company() {
    //     return $this->belongsTo(Company::class, 'company_id', 'id');
    // }

    // public function countryGroup() {
    //     return $this->belongsTo(CountryGroup::class, 'country_goup_id', 'id');
    // }


    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\CountryFactory::new();
    // }
}
