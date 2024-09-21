<?php

namespace Modules\Contact\Livewire\Modal;

use Carbon\Carbon;
use Modules\App\Livewire\Components\Form\Input;
use Modules\App\Livewire\Components\Modal\BaseModal;
use Modules\App\Livewire\Components\Modal\Button\Button;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Entities\ContactAddress;

class AddContactModal extends BaseModal
{
    public Contact $owner;
    public ContactAddress $contact;

    public $type = 'contact', $name, $phone, $mobile, $email, $job, $street, $street2, $city, $country, $zip, $saveAction;
    public array $contactTypeOptions;

    // Define validation rules
    protected $rules = [
        'name' => 'required|string|max:40',
        'phone' => ['nullable', 'string', 'min:9'], // Phone validation example
        'mobile' => ['nullable', 'string', 'min:9'], // Mobile validation example
        'email' => 'nullable|email',
        'street' => 'nullable|string|max:40',
        'street2' => 'nullable|string|max:40',
        'city' => 'nullable|string|max:20',
        'country' => 'nullable|integer|exists:countries,id',
        'zip' => 'nullable|string|max:9',
        'job' => 'nullable|string|max:25',
    ];
    public function mount($owner = null, $contact = null){
        $this->title = 'New Address';
        $this->saveAction = 'createAddress';
        if($this->owner && $contact){
            $this->owner = $owner;
            $this->contact = $contact;
            $this->title = 'Contact:'.$contact->name;
            $this->type = $contact->contact_type;
            $this->name = $contact->name;
            $this->phone = $contact->phone;
            $this->mobile = $contact->mobile;
            $this->email = $contact->email;
            $this->job = $contact->job;
            $this->street = $contact->street;
            $this->street2 = $contact->street2;
            $this->city = $contact->city;
            $this->country = $contact->country_id;
            $this->zip = $contact->zip;
            $this->saveAction = 'updateAddress';
        }

        $types = [
            ['id' => 'contact', 'label' => __('Contact')],
            ['id' => 'invoice-address', 'label' => __('Invoicing Address')],
            ['id' => 'delivery-address', 'label' => __('Delivery Address')],
            ['id' => 'other-address', 'label' => __('Others Address')],
        ];
        $this->contactTypeOptions = toRadioOptions($types, 'id', 'label', 'contact');

    }

    public function inputs() : array
    {
        return [
            Input::make('type', null, 'radio', 'type', 'top', 'none', 'none', null, null, $this->contactTypeOptions)->component('form.input.radio.special.contact-type'),
            Input::make('name', __('Contact Name'), 'text', 'name', 'left', 'none', 'none', __('e.g. Address Name')),
            Input::make('address', __('Address'), 'select', 'address', 'left', 'none', 'none', __('e.g. Arden BOUET'))->component('form.input.select.address'),
            Input::make('phone', __('Phone'), 'tel', 'phone', 'right', 'none', 'none'),
            Input::make('mobile', __('Mobile'), 'tel', 'mobile', 'right', 'none', 'none'),
            Input::make('email', __('Email'), 'email', 'email', 'right', 'none', 'none'),
        ];
    }

    public function buttons() : array
    {
        return [
            // key | label| class | type:action,modal | action
            Button::make('close', __('Discard'), 'btn-secondary', 'action', '$dispatch("closeModal")'),
            Button::make('save-close', __('Save & Close'), 'btn-primary', 'action', $this->saveAction),
        ];
    }

    public function updateAddress(){
        $address = ContactAddress::find($this->contact->id);
        $address->update([
            'contact_type' => $this->type,
            'name' => $this->name,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'job' => $this->job,
            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            'country_id' => $this->country,
            'zip' => $this->zip,
        ]);
        $address->save();

        $this->dispatch('charge-addresses');
        $this->closeModal();
    }

    public function createAddress(){
        $this->validate();
        $address = ContactAddress::create([
            'company_id' => current_company()->id,
            'contact_id' => $this->owner->id,
            'contact_type' => $this->type,
            'name' => $this->name,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'job' => $this->job,
            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            'country_id' => $this->country,
            'zip' => $this->zip,
        ]);
        $address->save();

        $this->dispatch('charge-addresses');
        $this->closeModal();

    }

}
