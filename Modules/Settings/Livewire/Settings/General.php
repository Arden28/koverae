<?php

namespace Modules\Settings\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Company\CompanyInvitation;
use Livewire\Component;
use Modules\Settings\Notifications\CompanyInvitationNotification;

class General extends AppSetting
{
    // Invite User
    public $friend_email, $pending_invitations;
    public $users;
    public array $actions1, $actions2, $actions3, $actions4, $actions5, $actions6;

    // Models
    public bool $has_digest_email = true;
    public $weight = 'kilograms', $volume = 'cubic_meter', $koverae_digest;

    public function mount(){
        $this->pending_invitations = CompanyInvitation::isCompany(current_company()->id)->get();
        $this->users = current_company()->users()->get();
        $this->actions1 = [
            [
                'key' => 'manage-users',
                'label' => __('Manage Users'),
                'icon' => 'bi-arrow-right',
                'is_link' => true,
                'action' => route('settings.users', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])
            ],
        ];
        $this->actions2 = [
            [
                'key' => 'add-language',
                'label' => __('Add a language'),
                'icon' => 'bi-plus-circle-fill',
                'is_link' => true,
                'action' => route('settings.users', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])
            ],
            [
                'key' => 'manage-languages',
                'label' => __('Mange languages'),
                'icon' => 'bi-arrow-right',
                'is_link' => true,
                'action' => route('settings.users', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])
            ],
        ];
        $this->actions3 = [
            [
                'key' => 'update-company',
                'label' => __('Update Information'),
                'icon' => 'bi-arrow-right',
                'is_link' => true,
                'action' => "#"
            ],
        ];
        $this->actions4 = [
            [
                'key' => 'configure-layout',
                'label' => __('Configure'),
                'icon' => 'bi-arrow-right',
                'is_link' => true,
                'action' => "#"
            ],
        ];
        $this->actions5 = [
            [
                'key' => 'email-template',
                'label' => __('Configure'),
                'icon' => 'bi-arrow-right',
                'is_link' => true,
                'action' => "#"
            ],
        ];
        $this->actions6 = [
            [
                'key' => 'email-digest',
                'label' => __('Configure'),
                'icon' => 'bi-arrow-right',
                'is_link' => true,
                'action' => "#"
            ],
        ];
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
            Box::make('active_users', $this->users->count() .' Active Users', 'invitation', null, 'users', false, "https://www.koverae.com/docs", " bi-people-fill", $this->actions1),
            Box::make('languages', __('1 Language(s)'), 'invitation', null, 'languages', false, "https://www.koverae.com/docs", " bi-translate", $this->actions2),
            Box::make('current-company', current_company()->name, 'companny', current_company()->country, 'companies', false, null, " bi-building", $this->actions3),
            Box::make('document-layout', __('Document layout'), 'companny', __("Choose the layout of your documents"), 'companies', false, null, " bi-files", $this->actions4),
            Box::make('email-template', __('E-mail templates'), 'companny', __("Customize the look and feel of automated emails"), 'companies', false, null, " bi-envelope", $this->actions5),
            Box::make('weight', __('Weight'), 'weight', __('Set your unit of weight measurement.'), 'uom', false)->component('blocks.boxes.uom.weight'),
            Box::make('volume', __('Volume'), 'volume', "Set your unit of measurement for volume.", 'uom', false, null, 'bi-moisture')->component('blocks.boxes.uom.volume'),
            Box::make('email-digest', __('E-mail Digest'), 'has_digest_email', null, 'analytics', true, "https://www.koverae.com/docs", "bi-envelope", $this->actions6)->component('blocks.boxes.email.digest'),
            // Add more buttons as needed
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

}
