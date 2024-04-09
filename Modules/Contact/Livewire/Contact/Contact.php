<?php

namespace Modules\Contact\Livewire\Contact;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\Contact as EntitiesContact;

class Contact extends Component
{

    public function render()
    {
        $contacts = EntitiesContact::isCompany(current_company()->id)->get();
        return view('contact::livewire.contact.contact', compact('contacts'))
        ->extends('layouts.master');
    }
}
