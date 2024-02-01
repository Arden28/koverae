<?php

namespace Modules\Contact\Livewire\Contact;

use Livewire\Component;
use Modules\Contact\Entities\Contact;
use Livewire\Attributes\Url;

class Create extends Component
{
    // #[Url(as: 'id')]
    // public $contact = '';

    public $is_company = true;

    public $name, $company_name, $street, $street2, $city, $department, $country, $zip, $tax_id, $job, $title, $phone, $mobile,
    $email, $website, $tags= [];

    public $seller, $sale_payment_term, $buyer, $purchase_payment_term, $note;

    protected $rules = [
        'name' => 'required|string|max:100',
        'company_name' => 'nullable',
        'street' => 'nullable',
        'street2' => 'nullable',
        'city' => 'nullable',
        'department' => 'nullable',
        'country' => 'nullable',
        'zip' => 'nullable',
        'tax_id' => 'nullable',
        'job' => 'nullable',
        'title' => 'nullable',
        'phone' => 'nullable',
        'mobile' => 'nullable',
        'email' => 'nullable|email',
        'website' => 'nullable',
        'tags' => 'nullable',
        'seller' => 'nullable',
        'sale_payment_term' => 'nullable',
        'buyer' => 'nullable',
        'purchase_payment_term' => 'nullable',
        'note' => 'nullable|string'
    ];

    // public function setContact(Contact $contact){
    //    $this->is_company =  $contact->is_company;
    //    $this->name =  $contact->name;
    //    $this->company_name =  $contact->company_name;
    //    $this->street =  $contact->street;
    //    $this->street2 =  $contact->street2;
    //    $this->city =  $contact->city;
    //     //$this->department =  $contact->department;
    //    $this->country =  $contact->country_id;
    //    $this->zip =  $contact->zip;
    //    $this->tax_id =  $contact->tax_id;
    //    $this->job =  $contact->job;
    //    $this->title =  $contact->title;
    //    $this->phone =  $contact->phone;
    //    $this->mobile =  $contact->mobile;
    //    $this->email =  $contact->email;
    //    $this->website =  $contact->website;
    //    $this->tags =  $contact->tags;
    //    $this->seller =  $contact->seller_id;
    //    $this->sale_payment_term =  $contact->sale_payment_term;
    //     //$this->buyer =  $contact->buyer;
    //    $this->purchase_payment_term =  $contact->purchase_payment_term;
    //    $this->note =  $contact->note;
    // }
    public function storeContact(){
        $this->validate();

        $contact = Contact::create([
            'company_id' => current_company()->id,
            'is_company' => $this->is_company,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            // 'department' => $this->department,
            'country_id' => $this->country,
            'zip' => $this->zip,
            'tax_id' => $this->tax_id,
            'job' => $this->job,
            'title' => $this->title,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'website' => $this->website,
            'tags' => $this->tags,
            'seller_id' => $this->seller,
            'sale_payment_term' => $this->sale_payment_term,
            // 'buyer' => $this->buyer,
            'purchase_payment_term' => $this->purchase_payment_term,
            'note' => $this->note
        ]);
        $contact->save();

        notify()->success("Nouveau Contact ajouté !");

        return redirect()->route('contacts.show', ['subdomain' => current_company()->domain_name, 'contact' => $contact->id, 'menu' => current_menu()]);
    }
    public function render()
    {
        return view('contact::livewire.contact.create')
        ->extends('layouts.master');
        // ->section('content');
    }
}
