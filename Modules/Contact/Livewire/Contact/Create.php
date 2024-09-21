<?php

namespace Modules\Contact\Livewire\Contact;

use Livewire\Component;
use Modules\Contact\Entities\Contact;
use Livewire\Attributes\Url;

class Create extends Component
{
    public function render()
    {
        return view('contact::livewire.contact.create')
        ->extends('layouts.master');
        // ->section('content');
    }
}
