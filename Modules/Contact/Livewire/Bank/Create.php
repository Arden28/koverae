<?php

namespace Modules\Contact\Livewire\Bank;

use Livewire\Component;
use Modules\Contact\Entities\Bank\Bank;

class Create extends Component
{
    public $name, $bic, $phone, $email, $website, $street, $street2, $city, $country, $zip;

    public $rules= [
        'name' => 'string|max:100',
        'bic' => 'string|max:12|nullable',
        'phone' => 'string|nullable',
        'email' => 'email|nullable',
        'website' => 'string|nullable',
        'street' => 'string|nullable',
        'street2' => 'string|nullable',
        'city' => 'string|nullable',
        'country' => 'string|nullable',
        'zip' => 'integer'
    ];

    public function storeBank(){
        $this->validate();
        $bank = Bank::create([
            'company_id' =>current_company()->id,
            'name' => $this->name,
            'bic' => $this->bic,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            'country' => $this->country,
            'zip' => $this->zip
        ]);
        $bank->save();
        notify()->success("Nouvelle Banque ajoutée !");

        return redirect()->route('contacts.banks.show', ['subdomain' => current_company()->domain_name, 'bank' => $bank->id, 'menu' => current_menu()]);
    }

    public function render()
    {
        return view('contact::livewire.bank.create')
        ->extends('layouts.master');
    }
}
