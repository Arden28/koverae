<?php

namespace Modules\Contact\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Contact\Interfaces\ContactInterface;

class ContactRepository implements ContactInterface{

    //Add Contact
    public function addContact($contact){
        DB::transaction(function () use ($contact) {

        });
    }

}
