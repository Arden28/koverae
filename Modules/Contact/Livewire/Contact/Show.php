<?php

namespace Modules\Contact\Livewire\Contact;

use Livewire\Component;
use Modules\Contact\Entities\Contact;

class Show extends Component
{
    public Contact $contact;

    public function mount(Contact $contact){
        $this->contact = $contact;
    }
    public function render()
    {
        return view('contact::livewire.contact.show')
        ->extends('layouts.master')
        ->section('content');
    }
}
