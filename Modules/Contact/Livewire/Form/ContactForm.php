<?php

namespace Modules\Contact\Livewire\Form;

use Modules\App\Livewire\Components\Form\Template\SimpleAvatarForm;
use Modules\App\Livewire\Components\Form\Input;
use Modules\App\Livewire\Components\Form\Tabs;
use Modules\App\Livewire\Components\Form\Group;
use Modules\App\Livewire\Components\Form\Button\ActionBarButton;
use Modules\App\Livewire\Components\Form\Button\StatusBarButton;
use Modules\App\Livewire\Components\Form\Button\ActionButton;
use Modules\App\Livewire\Components\Form\Capsule;
use Modules\App\Livewire\Components\Form\Table;
use Modules\App\Livewire\Components\Table\Column;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Contact;

class ContactForm extends SimpleAvatarForm
{
    use ActionBarButtonTrait, WithFileUploads;

    public $contact;

    public $name, $company_name, $street, $street2, $city, $department, $country, $zip, $tax, $job, $title, $phone, $mobile,
    $email, $website, $tags= [], $image_path,  $photo = null, $type = 'company', $language, $account_receivable, $account_payable, $seller, $buyer, $sale_payment_term, $purchase_payment_term, $days_before = 1, $companyID, $reference, $note, $bankAccount, $addresses;
    public bool $receipt_reminder = false;

    public array $contactTypeOptions = [], $languageOptions = [], $sellerOptions = [], $paymentTermOptions = [], $pricelistOptions = [], $fiscalPositionOptions = [], $buyerOptions = [], $accountingEntriesOptions = [];


    // Define validation rules
    protected $rules = [
        'name' => 'required|string|max:30',
        'phone' => ['nullable', 'string'], // Phone validation example
        // 'phone' => ['nullable', 'regex:/^[0-9]{10}$/'], // Phone validation example
        'mobile' => ['nullable', 'string'], // Mobile validation example
        'email' => 'nullable|email',
        'website' => 'nullable|url', // Validate that the website is a valid URL
        'company_name' => 'nullable|string|max:30',
        'street' => 'nullable|string|max:40',
        'street2' => 'nullable|string|max:40',
        'city' => 'nullable|string|max:20',
        'country' => 'nullable|integer|exists:countries,id',
        'zip' => 'nullable|string|max:9',
        'job' => 'nullable|string|max:25',
        'title' => 'nullable|integer|exists:honorific_titles,id',
        'language' => 'nullable|integer|exists:languages,id',
        'reference' => 'nullable|string|max:20',
        'note' => 'nullable|string|max:1000',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function mount($contact = null){
        $this->contact = $contact;
        $this->days_before = 1;
        if($contact){
            $this->image_path = $this->contact->avatar;
            $this->type = $contact->type;
            $this->name = $contact->name;
            $this->company_name = $contact->company_name;
            $this->street = $contact->street;
            $this->street2 = $contact->street2;
            $this->city = $contact->city;
            // $this->department = $contact->department;
            $this->country = $contact->country_id;
            $this->zip = $contact->zip;
            $this->tax = $contact->tax_id;
            $this->job = $contact->job;
            $this->title = $contact->title_id;
            $this->phone = $contact->phone;
            $this->mobile = $contact->mobile;
            $this->email = $contact->email;
            $this->website = $contact->website;
            $this->tags = $contact->tags;
            $this->account_receivable = $contact->account_receivable;
            $this->account_payable = $contact->account_payable;
            $this->seller = $contact->seller_id;
            $this->buyer = $contact->buyer_id;
            $this->sale_payment_term = $contact->sale_payment_term_id;
            $this->purchase_payment_term = $contact->purchase_payment_term_id;
            $this->receipt_reminder = $contact->has_receipt_reminder;
            $this->days_before = $contact->days_before;
            $this->companyID = $contact->companyID;
            $this->reference = $contact->reference;
            $this->note = $contact->note;
            $this->language = $contact->language_id;

            $this->bankAccount = BankAccount::isCompany(current_company()->id)->get();
            $this->addresses = $contact->contactAddresses;
        }

        $types = [
            ['id' => 'company', 'label' => __('Enterprise')],
            ['id' => 'individual', 'label' => __('Individual')],
        ];
        $this->contactTypeOptions = toRadioOptions($types, 'id', 'label', 'company');

        $buyers = current_company()->users()->get();
        $this->buyerOptions = toSelectOptions($buyers, 'id', 'name');

        $sellers = current_company()->sellers()->get();
        $this->sellerOptions = toSelectOptions($sellers, 'id', 'name');

        $buyers = current_company()->users()->get();
        $this->buyerOptions = toSelectOptions($buyers, 'id', 'name');

        $languages = current_company()->languages()->installed()->get();
        $this->languageOptions = toSelectOptions($languages, 'id', 'name');

    }

    public function capsules() : array
    {
        return [
            Capsule::make('sales', __('Sales'), __(''), 'link', 'bi-currency-dollar', "", ['parent' => module('sales'), 'amount' => 0])->component('form.capsule.depends'),
            Capsule::make('purchases', __('Purchases'), __(''), 'link', 'bi-credit-card', "", ['parent' => module('purchase'),'amount' => 0])->component('form.capsule.depends'),
            Capsule::make('punctuality', __('Punctuality rate'), __(''), 'link', 'bi-truck', "", ['parent' => module('purchase')])->component('form.capsule.depends'),
            Capsule::make('invoiced', __('Invoiced'), __(''), 'link', 'bi-pencil-square', "", ['parent' => module('invoicing'), 'amount' => 0])->component('form.capsule.depends'),
            Capsule::make('supplier', __('Supplier Bills'), __(''), 'link', 'bi-pencil-square', "", ['parent' => module('invoicing'), 'amount' => 0])->component('form.capsule.depends'),
            Capsule::make('employee', __('Employee'), __(''), 'link', 'bi-person-badge', "", ['parent' => module('employee'), 'amount' => 1])->component('form.capsule.depends'),
        ];
    }

    public function tabs() : array
    {
        return [
            Tabs::make('general',__('Contacts & Addresses')),
            Tabs::make('accounting',__('Invoicing'), null, true),
            Tabs::make('sales-purchase',__('Sales & Purchase')),
            Tabs::make('internal-note',__('Note'))->component('form.tab.note.summary'),
        ];
    }

    public function groups() : array
    {
        return [
            Group::make('contact-address',__("Contacts & Addresses"), 'general')->component('form.tab.group.special.contact-address'),
            Group::make('accounting-entries',__("Accounting Entries"), 'accounting'),
            Group::make('bank-account',__("Bank Accounts"), 'accounting')->component('form.tab.group.table'),
            Group::make('purchase',__("Purchase"), 'sales-purchase'),
            Group::make('sales',__("Sales"), 'sales-purchase'),
            Group::make('fiscal',__("Fiscal Information"), 'sales-purchase'),
            Group::make('misc',__("Miscellaneous"), 'sales-purchase'),
        ];
    }

    public function tables() : array
    {
        return  [
            // make($key, $label,$type, $tabs = null, $group = null)
            Table::make('bank-account',"Info", 'accounting', 'bank-account', $this->bankAccount),
        ];
    }

    public function columns() : array
    {
        return  [
            // make($key, $label)
            Column::make('account-number',__('Account Number'), 'bank-account'),
            Column::make('bank_id',__("Bank"), 'bank-account'),
            Column::make('can_send_money',__("Active"), 'bank-account'),
        ];
    }

    public function inputs() : array
    {
        return [

            Input::make('type', null, 'radio', 'type', 'top-title', 'none', 'none', null, null, $this->contactTypeOptions)->component('form.input.radio.simple'),
            Input::make('name', null, 'text', 'name', 'top-title', 'none', 'none', __('e.g. Arden BOUET'))->component('form.input.ke-title'),
            Input::make('company-name', null, 'text', 'company_name', 'top-title', 'none', 'none', __('Enterprise Name ....'))->component('form.input.subtitle'),
            Input::make('name', __('Address'), 'select', 'address', 'left', 'none', 'none', __('e.g. Arden BOUET'))->component('form.input.select.address'),
            Input::make('tax-id', __('Tax ID'), 'text', 'tax', 'left', 'none', 'none', __('e.g. KE0466566704')),
            Input::make('job', __('Job'), 'text', 'job', 'right', 'none', 'none', null, null, ['parent' => $this->type == 'individual'])->component('form.input.depends'),
            Input::make('email', __('Email'), 'email', 'email', 'right', 'none', 'none', null),
            Input::make('phone', __('Phone'), 'tel', 'phone', 'right', 'none', 'none', null),
            Input::make('mobile', __('Mobile'), 'tel', 'modbile', 'right', 'none', 'none', null),
            Input::make('website', __('Website'), 'text', 'website', 'right', 'none', 'none', __('e.g. https://www.koverae.com')),
            Input::make('language', __('Language'), 'select', 'language', 'right', 'none', 'none', null, null, $this->languageOptions),
            // Accounting
            Input::make('receivable', __('Account Receivable'), 'select', 'account_receivable', 'left', 'accounting', 'accounting-entries', null, null, $this->languageOptions),
            Input::make('payable', __('Account Payable'), 'select', 'account_payable', 'left', 'accounting', 'accounting-entries', null, null, $this->languageOptions),
            // Sales
            Input::make('seller', __('Seller'), 'select', 'seller', 'left', 'sales-purchase', 'sales', null, null, $this->sellerOptions),
            Input::make('sale-payment-term', __('Payment Term'), 'select', 'sale_payment_term', 'left', 'sales-purchase', 'sales', null, null, $this->paymentTermOptions),
            Input::make('pricelist', __('Pricelist'), 'select', 'pricelist', 'left', 'sales-purchase', 'sales', null, null, $this->pricelistOptions),
            Input::make('delivery-method', __('Delivery Method'), 'select', 'delivery_method', 'left', 'sales-purchase', 'sales', null, null, $this->pricelistOptions),
            // Purchase
            Input::make('buyer', __('Buyer'), 'select', 'buyer', 'left', 'sales-purchase', 'purchase', null, null, $this->buyerOptions),
            Input::make('purchase-payment-term', __('Payment Term'), 'select', 'purchase_payment_term', 'left', 'sales-purchase', 'purchase', null, null, $this->paymentTermOptions),
            Input::make('receipt-reminder', __('Receipt Reminder'), 'checkbox', 'receipt_reminder', 'left', 'sales-purchase', 'purchase', null, null)->component('form.input.checkbox.simple'),
            // Fiscal Information
            Input::make('fiscal-position', __('Fiscal Position'), 'select', 'fiscal_position', 'left', 'sales-purchase', 'fiscal', null, null, $this->fiscalPositionOptions),
            Input::make('companyID', __('Enterprise ID'), 'text', 'companyID', 'left', 'sales-purchase', 'misc', null, null),
            Input::make('reference', __('Reference'), 'text', 'reference', 'left', 'sales-purchase', 'misc', null, null),
            // Internal Notes
            Input::make('note', __('Note'), 'textarea', 'note', 'left', 'internal-note', 'none', __('Internal notes on contact....'), null)->component('form.input.textarea.tabs-middle'),
        ];
    }

    #[On('charge-addresses')]
    public function chargeAddresses(){
        $this->addresses = $this->contact->contactAddresses;
    }

    public function updatedPhoto(){
        // Validate the uploaded file
        $this->validate();
        if($this->contact){
            $contact = Contact::find($this->contact->id);
    
            if(!$this->image_path){
                $this->image_path = $contact->id . '_avatar.png';
    
                // $this->photo->storeAs('avatars', $this->image_path, 'public');
                $contact->update([
                    'avatar' => $this->image_path,
                ]);
            }
    
            $this->photo->storeAs('avatars', $this->image_path, 'public');
    
    
            // Send success message
            session()->flash('message', 'Avatar updated successfully!');
        }
    }

    #[On('update-contact')]
    public function updateContact(){
        $contact = Contact::find($this->contact->id);

        $this->validate();
        if(!$this->image_path){
            $this->image_path = $contact->id . '_avatar.png';
        }
        if($this->photo){
            $this->photo->storeAs('avatars', $this->image_path, 'public');
        }

        $contact->update([
            'avatar' => $this->image_path,
            'type' => $this->type,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            'country_id' => $this->country,
            'zip' => $this->zip,
            'tax_id' => $this->tax,
            'job' => $this->job,
            'title_id' => $this->title,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'website' => $this->website,
            'tags' => $this->tags,
            'account_receivable' => $this->account_receivable,
            'account_payable' => $this->account_payable,
            'seller_id' => $this->seller,
            'buyer_id' => $this->buyer,
            'sale_payment_term_id' => $this->sale_payment_term,
            'purchase_payment_term_id' => $this->purchase_payment_term,
            'has_receipt_reminder' => $this->receipt_reminder,
            'days_before' => $this->days_before,
            'companyID' => $this->companyID,
            'reference' => $this->reference,
            'note' => $this->note,
            'language_id' => $this->language,
        ]);
        $contact->save();
        return redirect()->route('contacts.show', ['subdomain' => current_company()->domain_name, 'contact' => $contact->id, 'menu' => current_menu()]);
    }
    

    #[On('create-contact')]
    public function createContact(){

        $this->validate();
        // if(!$this->image_path){
        //     $this->image_path = $contact->id . '_avatar.png';
        // }
        $contact =  Contact::create([
            'company_id' => current_company()->id,
            // 'avatar' => $this->image_path,
            'type' => $this->type,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            'country_id' => $this->country,
            'zip' => $this->zip,
            'tax_id' => $this->tax,
            'job' => $this->job,
            'title_id' => $this->title,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'website' => $this->website,
            'tags' => $this->tags,
            'account_receivable' => $this->account_receivable,
            'account_payable' => $this->account_payable,
            'seller_id' => $this->seller,
            'buyer_id' => $this->buyer,
            'sale_payment_term_id' => $this->sale_payment_term,
            'purchase_payment_term_id' => $this->purchase_payment_term,
            'has_receipt_reminder' => $this->receipt_reminder,
            'days_before' => 0,
            'companyID' => $this->companyID,
            'reference' => $this->reference,
            'note' => $this->note,
            'language_id' => $this->language,
        ]);
        $contact->save();
        
        $avatar = $contact->id.'_avatar.png';
        if($this->photo){
            $this->photo->storeAs('avatars', $avatar, 'public');
        }
        $contact->update([
            'avatar' => $avatar,
        ]);

        return redirect()->route('contacts.show', ['subdomain' => current_company()->domain_name, 'contact' => $contact->id, 'menu' => current_menu()]);
    }
}
