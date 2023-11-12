<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class ContactAdress extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // Get Contact
    public function contact() {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\ContactAdressFactory::new();
    // }
}
