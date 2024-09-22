<?php

namespace Modules\Contact\Livewire\Form;

use Livewire\Attributes\On;
use Modules\App\Livewire\Components\Form\BaseForm;
use Modules\App\Livewire\Components\Form\Input;
use Modules\Contact\Entities\Bank\Bank;
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Contact;

class BankAccountForm extends BaseForm
{
    public $account;
    public $number, $bank, $holder, $holder_name;
    public bool $send = false;
    public array $bankOptions = [], $holderOptions = [];

    protected $rules = [
        'number' => 'required',
        'bank' => 'required|integer|exists:banks,id',
        'holder' => 'required|string|exists:contacts,id',
        'send' => 'boolean'
    ];
    public function mount($account = null){
        if($account){
            $this->account = $account;
            $this->number = $account->account_number;
            $this->bank = $account->bank_id;
            $this->holder = $account->contact_id;
            $this->send = $account->can_send_money;
        }
        $banks = Bank::isCompany(current_company()->id)->get();
        $this->bankOptions = toSelectOptions($banks, 'id', 'name');

        $holders = Contact::isCompany(current_company()->id)->get();
        $this->holderOptions = toSelectOptions($holders, 'id', 'name');
    }
    public function inputs() : array
    {
        return [
            Input::make('number', __('Account Number'), 'text', 'number', 'left', 'none', 'none'),
            Input::make('bank', __('Bank'), 'select', 'bank', 'left', 'none', 'none', "", null, $this->bankOptions),
            Input::make('holder', __('Account Holder'), 'select', 'holder', 'left', 'none', 'none', "", null, $this->holderOptions),
        ];
    }

    #[On('create-bank-account')]
    public function createBankAccount(){
        $this->validate();
        $account = BankAccount::create([
            'company_id' => current_company()->id,
            'account_number' => $this->number,
            'bank_id' => $this->bank,
            'contact_id' => $this->holder,
            'account_holder_name' => $this->holder,
            'can_send_money' => $this->send,
        ]);
        $account->save();

        return redirect()->route('contacts.banks.accounts.show', ['subdomain' => current_company()->domain_name, 'account' => $account->id, 'menu' => current_menu()]);
    }

    #[On('update-bank-account')]
    public function updateBankAccount(){
        $this->validate();
        $account = BankAccount::find($this->account->id)->first();
        $account->update([
            'account_number' => $this->number,
            'bank_id' => $this->bank,
            'contact_id' => $this->holder,
            'account_holder_name' => $this->holder,
            'can_send_money' => $this->send,
        ]);
        return redirect()->route('contacts.banks.accounts.show', ['subdomain' => current_company()->domain_name, 'account' => $account->id, 'menu' => current_menu()]);
    }

}
