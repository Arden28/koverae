<?php

namespace Modules\Contact\Livewire\Bank\Account;

use Livewire\Component;
use Modules\Contact\Entities\Bank\Bank;
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Contact;

class Show extends Component
{
    public BankAccount $account;

    public $bank, $account_holder, $account_number, $account_holder_name;

    public $rules= [
        'bank' => 'integer|nullable',
        'account_holder' => 'required',
        'account_number' => 'numeric|required',
        'account_holder_name' => 'string|nullable',
    ];

    public function mount(BankAccount $account){
        $this->account = $account;
        $this->bank = $account->bank_id;
        $this->account_holder = $account->contact_id;
        $this->account_number = $account->account_number;
        $this->account_holder_name = $account->account_holder_name;

    }
    public function updateBankAccount(BankAccount $account){
        $this->validate();

        $account->update([
            'bank_id' => $this->bank,
            'contact_id' => $this->account_holder,
            'account_number' => $this->account_number,
            'account_holder_name' => $this->account_holder_name,
        ]);
        $account->save();

    }

    public function render()
    {
        $banks = Bank::isCompany(current_company()->id)->orderBy('id', 'DESC')->get();
        $contacts = Contact::isCompany(current_company()->id)->orderBy('id', 'DESC')->get();
        return view('contact::livewire.bank.account.show', compact('banks', 'contacts'))
        ->extends('layouts.master');
    }
}
