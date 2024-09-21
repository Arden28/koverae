<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Entities\Localization\Country;

class ContactAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // Get Contact
    public function contact() {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
    // Get Contact
    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\ContactAdressFactory::new();
    // }
}
