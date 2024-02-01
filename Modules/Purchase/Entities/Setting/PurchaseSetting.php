<?php

namespace Modules\Purchase\Entities\Setting;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Purchase\Database\factories\PurchaseSettingFactory;

class PurchaseSetting extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }


    // protected static function newFactory(): PurchaseSettingFactory
    // {
    //     //return PurchaseSettingFactory::new();
    // }
}
