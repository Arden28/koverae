<?php

namespace Modules\Contact\Livewire\Bank;

use Livewire\Component;
use Modules\Contact\Entities\Bank\Bank;

class Show extends Component
{
    public Bank $bank;

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
    public function mount(Bank $bank){
        $this->bank = $bank;
        $this->name = $bank->name;
        $this->bic = $bank->bic;
        $this->phone = $bank->phone;
        $this->email = $bank->email;
        $this->website = $bank->website;
        $this->street = $bank->street;
        $this->street2 = $bank->street2;
        $this->city = $bank->city;
        $this->country = $bank->country;
        $this->zip = $bank->zip;

    }

    public function updateBank(Bank $bank){
        $this->validate();

        $bank->update([
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

    }

    public function render()
    {
        return view('contact::livewire.bank.show')
        ->extends('layouts.master');
    }
}
