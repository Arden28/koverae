<?php

namespace Modules\Contact\Livewire\Bank\Account;

use Livewire\Component;
use Modules\Contact\Entities\Bank\Bank;
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Contact;

class Create extends Component
{
    public $bank, $account_holder, $account_number, $account_holder_name, $website;

    public $rules= [
        'bank' => 'integer|nullable',
        'account_holder' => 'required',
        'account_number' => 'numeric|required',
        'account_holder_name' => 'string|nullable',
    ];

    public function storeBankAccount(){
        $this->validate();
        $account = BankAccount::create([
            'company_id' =>current_company()->id,
            'bank_id' => $this->bank,
            'contact_id' => $this->account_holder,
            'account_number' => $this->account_number,
            'account_holder_name' => $this->account_holder_name,
        ]);
        $account->save();
        notify()->success("Nouveau compte bancaire ajoutée !");

        return redirect()->route('contacts.banks.accounts.show', ['subdomain' => current_company()->domain_name, 'account' => $account->id, 'menu' => current_menu()]);
    }

    public function render()
    {
        $banks = Bank::isCompany(current_company()->id)->orderBy('id', 'DESC')->get();
        $contacts = Contact::isCompany(current_company()->id)->orderBy('id', 'DESC')->get();
        return view('contact::livewire.bank.account.create', compact('banks', 'contacts'))
        ->extends('layouts.master');
    }
}
