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
use Modules\Contact\Entities\Bank\BankAccount;
use Modules\Contact\Entities\Contact;

class ContactForm extends SimpleAvatarForm
{
    use ActionBarButtonTrait;

    public $contact;

    public $name, $company_name, $street, $street2, $city, $department, $country, $zip, $tax_id, $job, $title, $phone, $mobile,
    $email, $website, $tags= [], $image_path,  $photo = null, $type = 'company', $language, $account_receivable, $account_payable, $seller, $buyer, $sale_payment_term, $purchase_payment_term, $days_before;
    public $bankAccount;
    public bool $receipt_reminder;

    public array $contactTypeOptions = [], $languageOptions = [];

    public function mount($contact = null){
        $this->contact = $contact;
        if($contact){
            $this->type = $contact->type;
            $this->name = $contact->name;
            $this->company_name = $contact->company_name;
            $this->street = $contact->street;
            $this->street2 = $contact->street2;
            $this->city = $contact->city;
            $this->department = $contact->department;
            $this->country = $contact->country;
            $this->zip = $contact->zip;
            $this->tax_id = $contact->tax_id;
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
            $this->receipt_reminder = $contact->receipt_reminder;
            $this->days_before = $contact->days_before;

            $this->bankAccount = BankAccount::isCompany(current_company()->id)->get();
        }

        $types = [
            ['id' => 'company', 'label' => __('Enterprise')],
            ['id' => 'individual', 'label' => __('Individual')],
        ];
        $this->contactTypeOptions = toRadioOptions($types, 'id', 'label', 'company');

        $languages = current_company()->languages()->installed()->get();
        $this->languageOptions = toSelectOptions($languages, 'id', 'name');

    }

    public function tabs() : array
    {
        return [
            Tabs::make('general',__('Contacts & Addresses')),
            Tabs::make('accounting',__('Invoicing'), null, true),
            Tabs::make('sales-purchase',__('Sales & Purchase')),
            Tabs::make('internal-note',__('Note')),
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
            Input::make('name', __('Address'), 'select', 'address', 'left', 'none', 'none', __('e.g. Arden BOUET'))->component('form.input.select.address'),
            Input::make('tax-id', __('Tax ID'), 'text', 'tax', 'left', 'none', 'none', __('e.g. KE0466566704')),
            Input::make('email', __('Email'), 'email', 'email', 'right', 'none', 'none', null),
            Input::make('phone', __('Phone'), 'tel', 'phone', 'right', 'none', 'none', null),
            Input::make('mobile', __('Mobile'), 'tel', 'modbile', 'right', 'none', 'none', null),
            Input::make('website', __('Website'), 'text', 'website', 'right', 'none', 'none', __('e.g. https://www.koverae.com')),
            Input::make('language', __('Language'), 'select', 'language', 'right', 'none', 'none', null, null, $this->languageOptions),
            // Accounting
            Input::make('receivable', __('Account Receivable'), 'select', 'account_receivable', 'left', 'accounting', 'accounting-entries', null, null, $this->languageOptions),
            Input::make('payable', __('Account Payable'), 'select', 'account_payable', 'left', 'accounting', 'accounting-entries', null, null, $this->languageOptions),
            // Sales
            Input::make('seller', __('Seller'), 'select', 'seller', 'left', 'sales-purchase', 'sales', null, null, $this->languageOptions),
            Input::make('sale-payment-term', __('Payment Term'), 'select', 'sale_payment_term', 'left', 'sales-purchase', 'sales', null, null, $this->languageOptions),
            Input::make('pricelist', __('Pricelist'), 'select', 'pricelist', 'left', 'sales-purchase', 'sales', null, null, $this->languageOptions),
            Input::make('delivery-method', __('Delivery Method'), 'select', 'delivery_method', 'left', 'sales-purchase', 'sales', null, null, $this->languageOptions),
            // Purchase
            Input::make('buyer', __('Buyer'), 'select', 'buyer', 'left', 'sales-purchase', 'purchase', null, null, $this->languageOptions),
            Input::make('purchase-payment-term', __('Payment Term'), 'select', 'purchase_payment_term', 'left', 'sales-purchase', 'purchase', null, null, $this->languageOptions),
            Input::make('receipt-reminder', __('Receipt Reminder'), 'checkbox', 'receipt_reminder', 'left', 'sales-purchase', 'purchase', null, null, $this->languageOptions),

        ];
    }

}
