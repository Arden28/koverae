<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Settings\Entities\Currency;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['currency'];

    public function currency() {
        return $this->belongsTo(Currency::class, 'default_currency_id', 'id');
    }


    // protected static function newFactory()
    // {
    //     return \Modules\Settings\Database\factories\SettingFactory::new();
    // }
}
