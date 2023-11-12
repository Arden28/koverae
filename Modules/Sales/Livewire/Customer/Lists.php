<?php

namespace Modules\Sales\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\Contact as EntitiesContact;

class Lists extends Component
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
        return view('sales::livewire.customer.lists', compact('contacts'))
        ->extends('layouts.master')
        ->section('content');
    }
}
