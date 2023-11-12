<?php

namespace Modules\Contact\Livewire\Country;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\Localization\Country;

class Lists extends Component
{
    use WithPagination;

    public $view = 'lists';

    public $show = 70;  // Default number of employees to show

    public $selectedContact = []; //Checkbox select

    public $deleteId = '';

    public function changeView($view){
        $this->view = $view;
    }
    public function render()
    {
        $countries = Country::paginate($this->show);
        return view('contact::livewire.country.lists', compact('countries'))
        ->extends('layouts.master');
    }
}
