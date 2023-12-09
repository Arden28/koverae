<?php

namespace Modules\Settings\Livewire\Module;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Company\CompanyInvitation;

class General extends Component
{

    // Invite User
    public $friend_email, $pending_invitations;

    // Unit of measure
    public $weight = 'kg', $volume = 'cm3';

    // Language
    public $language, $languages;

    // Email Digest
    public $digest_available, $digest, $digest_models;

    // Permissions
    public $kover_portal, $kover_portal_type, $can_reset_password, $has_all_rights_access, $reset_password, $can_import_from_xls;

    public function mount(){
        $this->pending_invitations = CompanyInvitation::isCompany(current_company()->id)->get();
    }

    public function render()
    {
        return view('settings::livewire.module.general');
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

        $this->friend_email = '';
        $this->pending_invitations = CompanyInvitation::isCompany(current_company()->id)->get();

    }

    public function deleteInvitation(CompanyInvitation $invitation){

        $invitation->delete();
        $this->pending_invitations = CompanyInvitation::isCompany(current_company()->id)->get();
    }
}
