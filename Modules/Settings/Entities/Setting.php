<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Settings\Entities\Currency;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['currency'];

    // If the contacts belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function currency() {
        return $this->belongsTo(Currency::class, 'default_currency_id', 'id');
    }


    // protected static function newFactory()
    // {
    //     return \Modules\Settings\Database\factories\SettingFactory::new();
    // }
}
