<?php

namespace Modules\Settings\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use App\Livewire\Settings\BoxAction;
use App\Livewire\Settings\BoxInput;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Company\CompanyInvitation;
use App\Models\User;
use Livewire\Attributes\On;
use Modules\Settings\Notifications\CompanyInvitationNotification;

class General extends AppSetting
{
    public $setting;

    // Invite User
    public $friend_email, $pending_invitations;
    public $users;
    public array $digest_templates = [], $geolocationProvider = [];
    // UoM
    public array $uom_weight = [], $weightOptions = [];
    // Customer Portal
    public array $customer_portal_access = [], $cutomerPortalAccessOptions = [];

    // Models
    public $weight = 'kilograms', $volume = 'cubic_meter', $koverae_digest, $has_customer_account = 'on_invitation', $geolocation_provider = 'open_street_map';
    public bool $has_digest_email = true, $has_default_access_right = true, $has_geo_localization = false, $has_recaptcha = false, $has_reset_password = true, $has_quick_find = true, $has_import_from_xls = true;

    public function mount($setting){
        $this->setting = $setting;
        $this->weight = $setting->weight;
        $this->volume = $setting->volume;
        $this->has_customer_account = $setting->has_customer_account;
        $this->has_digest_email = $setting->has_digest_email;
        $this->has_default_access_right = $setting->has_default_access_right;
        $this->has_geo_localization = $setting->has_geo_localization;
        $this->geolocation_provider = $setting->geolocation_provider;
        $this->has_recaptcha = $setting->has_recaptcha;
        $this->has_reset_password = $setting->has_reset_password;
        $this->has_quick_find = $setting->has_quick_find;
        $this->has_import_from_xls = $setting->has_import_from_xls;
        
        $this->pending_invitations = CompanyInvitation::isCompany(current_company()->id)->get();
        $this->users = current_company()->users()->get();
        $this->digest_templates = toSelectOptions(User::all(), 'id', 'email');
        $geoProvider = [
            ['id' => 'open_street_map', 'label' => 'Open Street Map', 'key' => ''],
            ['id' => 'google_place_map', 'label' => 'Google Place Map', 'key' => '']
        ];
        $this->geolocationProvider = toSelectOptions($geoProvider, 'id', 'label');
        // Weight
        $this->customer_portal_access = [
            ['id' => 'kilograms', 'label' => 'Kg'],
            ['id' => 'pounds', 'label' => 'Ib']
        ];
        $this->cutomerPortalAccessOptions = toRadioOptions($this->customer_portal_access, 'id', 'label', 'on_invitation');

        $this->customer_portal_access = [
            ['id' => 'on_invitation', 'label' => 'Invitation'],
            ['id' => 'free_signup', 'label' => 'Free']
        ];
        $this->cutomerPortalAccessOptions = toRadioOptions($this->customer_portal_access, 'id', 'label', 'on_invitation');
    }

    public function blocks() : array
    {
        return [
            Block::make('users', __('Users')),
            Block::make('languages', _('Languages')),
            Block::make('companies', __('Enterprises')),
            Block::make('uom', __('Units Of Measure')),
            Block::make('analytics', 'Analytics'),
            Block::make('permissions', 'Permissions'),
            Block::make('contacts', 'Contacts'),
            Block::make('integrations', 'Integrations'),
            Block::make('devs', 'Developers'),
            Block::make('about', 'Koverae'),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            // key, label, model, description, block,checkbox, help(link), icon, actions
            Box::make('invite_users', __('Invite Users'), 'invitation', ' ', 'users', false)->component('blocks.boxes.user.invite-user'),
            Box::make('active_users', $this->users->count() .' Active Users', 'invitation', null, 'users', false, "https://www.koverae.com/docs", " bi-people-fill"),
            Box::make('languages', __('1 Language(s)'), 'invitation', null, 'languages', false, "https://www.koverae.com/docs", " bi-translate"),
            Box::make('current-company', current_company()->name, 'companny', current_company()->country, 'companies', false, null, " bi-building"),
            Box::make('document-layout', __('Document layout'), 'companny', __("Choose the layout of your documents"), 'companies', false, null, " bi-files"),
            Box::make('email-template', __('E-mail templates'), 'companny', __("Customize the look and feel of automated emails"), 'companies', false, null, " bi-envelope"),
            Box::make('weight', __('Weight'), 'weight', __('Set your unit of weight measurement.'), 'uom', false)->component('blocks.boxes.uom.weight'),
            Box::make('volume', __('Volume'), 'volume', "Set your unit of measurement for volume.", 'uom', false, null, 'bi-moisture')->component('blocks.boxes.uom.volume'),
            Box::make('email-digest', __('E-mail Digest'), 'has_digest_email', __('Add new users as recipients of a periodic email with key performance indicators'), 'analytics', true, "https://www.koverae.com/docs", "bi-envelope"),
            Box::make('customer-portal', __('Customer Portal'), 'has_customer_account', __('Let your customers log in to view their documents'), 'permissions', false),
            Box::make('default-access', __('Default Access Rights'), 'has_default_access_right', __('Set custom access rights for new users'), 'permissions', true),
            Box::make('password-reset', __('Password Reset'), 'has_reset_password', __('Enable password reset from Login page'), 'permissions', true),
            Box::make('import-export', __('Import / Export'), 'has_import_from_xls', __('Allow users to import data from CSV/XLS/XLSX files'), 'permissions', true, "https://www.koverae.com/docs"),
            Box::make('recaptcha', __('reCAPTCHA'), 'has_recaptcha', __('Protect your forms from spam and abuse.'), 'integrations', true, "https://www.koverae.com/docs"),
            Box::make('geolocation', __('Geolocation'), 'has_geo_localization', __('Geolocate your partners and customers.'), 'integrations', true, "https://www.koverae.com/docs"),
            Box::make('developers', __('Developers'), 'developers', null, 'devs', false, "https://www.koverae.com/docs")->component('blocks.boxes.template.developer'),
            Box::make('developers', __('Developers'), 'developers', null, 'about', false, "https://www.koverae.com/docs")->component('blocks.boxes.template.about'),
            Box::make('send-sms', __('SmS Sending'), 'company', __('Send texts to your contacts.'), 'contacts', false, "https://www.koverae.com/docs"),
            Box::make('koverae-iap', __('Koverae IAP'), 'company', __('View your IAP Services and recharge your Kredit balance.'), 'contacts', false, "https://www.koverae.com/docs"),
            Box::make('quick-find', __('Quick Find'), 'has_quick_find', __('Automatically enrich your contact base with company data.'), 'contacts', true),
            // Add more buttons as needed
        ];
    }

    // Boxes Inputs
    public function inputs(): array
    {
        return [
            BoxInput::make('email-digest-templates', __('Templates'), 'select', 'digest_template', 'email-digest', '', false, $this->digest_templates),
            BoxInput::make('customer-portal-access', null, 'radio', 'has_customer_account', 'customer-portal', '', false, $this->cutomerPortalAccessOptions)->component('blocks.boxes.input.radio'),
            BoxInput::make('geolocation-provider', null, 'select', 'geolocation_provider', 'geolocation', '', false, $this->geolocationProvider, $this->geolocation_provider),
        ];
    }

    // Boxes Actions
    public function actions(): array
    {
        return [
            BoxAction::make('manage-users', 'active_users', __('Manage Users'), 'link', 'bi-arrow-right'),
            BoxAction::make('email-digest-templates', 'email-digest', __('Configure'), 'link', 'bi-arrow-right'),
            BoxAction::make('add-language', 'languages', __('Add a language'), 'modal', 'bi-plus-circle-fill', "{component: 'settings::modal.add-language'}"),
            // BoxAction::make('manage-languages', 'languages', __('Manage languages'), 'link', 'bi-arrow-right'),
            BoxAction::make('update-company', 'current-company', __('Update Information'), 'link', 'bi-arrow-right'),
            BoxAction::make('configure-layout', 'document-layout', __('Configure'), 'link', 'bi-arrow-right'),
            BoxAction::make('email-template', 'email-template', __('Configure'), 'link', 'bi-arrow-right'),
            BoxAction::make('default-access', 'customer-portal', __('Default access rights'), 'link', 'bi-arrow-right'),
            BoxAction::make('default-access', 'default-access', __('Default access rights'), 'link', 'bi-arrow-right'),
            BoxAction::make('buy-credit-quick', 'quick-find', __('Buy Kredit'), 'link', 'bi-arrow-right'),
            BoxAction::make('buy-credit-sms', 'send-sms', __('Buy Kredit'), 'link', 'bi-arrow-right'),
            BoxAction::make('koverae-iap-view', 'koverae-iap', __('View My Kover Services'), 'link', 'bi-arrow-right'),
        ];
    }

    public function sendInvitation(){
        // Validate the form data
        $this->validate([
            'friend_email' => 'required|email|unique:company_invitations,email',
        ]);

        // Generate a unique invitation token
        $token = Str::random(32);

        // Create a new invitation record
        $invitation = CompanyInvitation::create([
            'team_id' => Auth::user()->team->id,
            'company_id' => current_company()->id,
            'email'     => $this->friend_email,
            'token' => $token,
            'role' => 'default',
            'expire_at' => now()->addDays(7),
        ]);
        $invitation->save();

        // Send the invitation notification
        $invitation->notify(new CompanyInvitationNotification());

        $this->friend_email = '';
        $this->pending_invitations = CompanyInvitation::isCompany(current_company()->id)->get();

    }

    public function deleteInvitation(CompanyInvitation $invitation){

        $invitation->delete();
        $this->pending_invitations = CompanyInvitation::isCompany(current_company()->id)->get();
    }

    
    #[On('save')]
    public function save(){
        $setting = $this->setting;

        $setting->update([
            'weight' => $this->weight,
            'volume' => $this->volume,
            'has_customer_account' => $this->has_customer_account,
            'has_digest_email' => $this->has_digest_email,
            'has_default_access_right' => $this->has_default_access_right,
            'has_geo_localization' => $this->has_geo_localization,
            'has_recaptcha' => $this->has_recaptcha,
            'has_reset_password' => $this->has_reset_password,
            'has_import_from_xls' => $this->has_import_from_xls,
            'has_quick_find' => $this->has_quick_find,
        ]);
        $setting->save();

        cache()->forget('settings');

        notify()->success('Modifications sauvegardées');
        $this->dispatch('undo-change');

    }
    public function updated(){
        $this->dispatch('change');
    }
    

}
