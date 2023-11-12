<?php

namespace Modules\Contact\Livewire\Contact;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\Contact as EntitiesContact;

class Contact extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 10;  // Default number of employees to show

    public $selectedContact = []; //Checkbox select

    public $deleteId = '';

    public function changeView($view){
        $this->view = $view;
    }

    public function render()
    {
        $contacts = EntitiesContact::isCompany(current_company()->id)->paginate($this->show);
        return view('contact::livewire.contact.contact', compact('contacts'))
        ->extends('layouts.master')
        ->section('content');
    }
}
