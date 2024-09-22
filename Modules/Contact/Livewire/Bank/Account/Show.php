<?php

namespace Modules\Contact\Livewire\Bank\Account;

use Livewire\Component;
use Modules\Contact\Entities\Bank\Bank;
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Contact;

class Show extends Component
{
    public BankAccount $account;

    public function mount(BankAccount $account){
        $this->account = $account;
    }

    public function render()
    {
        return view('contact::livewire.bank.account.show')
        ->extends('layouts.master');
    }
}
