<?php

namespace Modules\Contact\Entities\Localization;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CountryGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the state belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    // Get Company
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // Get Country
    // public function countries() {
    //     return $this->hasMany(Country::class, 'country_id', 'id');
    // }

    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\CountryGroupFactory::new();
    // }
}
