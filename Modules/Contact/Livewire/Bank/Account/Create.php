<?php

namespace Modules\Contact\Livewire\Bank\Account;

use Livewire\Component;
use Modules\Contact\Entities\Bank\Bank;
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Contact;

class Create extends Component
{
    public function render()
    {
        return view('contact::livewire.bank.account.create')
        ->extends('layouts.master');
    }
}
