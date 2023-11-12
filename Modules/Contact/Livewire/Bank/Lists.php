<?php

namespace Modules\Contact\Livewire\Bank;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\Bank\Bank;

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
        $banks = Bank::isCompany(current_company()->id)->paginate($this->show);
        return view('contact::livewire.bank.lists', compact('banks'))
        ->extends('layouts.master');
    }
}
