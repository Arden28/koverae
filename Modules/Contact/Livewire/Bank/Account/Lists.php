<?php

namespace Modules\Contact\Livewire\Bank\Account;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Contact\Entities\Bank\BankAccount;

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
        $accounts = BankAccount::isCompany(current_company()->id)->paginate($this->show);
        return view('contact::livewire.bank.account.lists', compact('accounts'))
        ->extends('layouts.master');
    }

}
