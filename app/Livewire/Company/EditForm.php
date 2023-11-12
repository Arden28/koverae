<?php

namespace App\Livewire\Company;

use App\Models\Company\Company;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditForm extends Component
{
    public $company;

    public $companyId,  $name, $phone, $phone2, $email, $address, $city;

    public function mount(Company $company){
        // $company = Company::where('domain_name', $domain_name)->first();

        $this->companyId = $company->id;
        $this->name = $company->name;
        $this->phone = $company->phone;
        $this->phone2 = $company->phone_2;
        $this->email = $company->email;
        $this->address = $company->address;
        $this->city = $company->city;

    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:255',
        'phone2' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        // Add more rules as needed
    ];

    public function updateCompany(){
        $this->validate();

        // Update the company data
        $company = Company::find($this->companyId);
        if ($company) {
            $company->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.company.edit-form')->layout('layouts.master');
    }
}
