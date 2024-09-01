@props([
    'value',

])

<!-- Box -->
<div class="k_settings_box col-12 col-lg-6 k_searchable_setting" id="{{ $value->key }}">
    <!-- Right pane -->
    <div class="k_setting_right_pane">
        <form wire:submit.prevent="sendInvitation">
            @csrf
            <div>
                <p class="k_form_label">
                    @if($value->icon)
                        <i class="inline-block bi {{ $value->icon }}"></i>
                    @endif
                    <span class="ml-2">{{ $value->label }}</span>
                    @if($value->help)
                    <a href="{{ $value->help }}" target="__blank" title="documentation" class="k_doc_link">
                        <i class="bi bi-question-circle-fill"></i>
                    </a>
                    @endif
                </p>
                <div class="d-flex">
                    <input type="text" wire:model="friend_email" class="mt-8 k_input k_user_emails text-truncate" style="width: auto;" placeholder="Entrez l'adresse e-mail">
                    <button type="submit" wire:target="sendInvitation" style="background-color: #017E84" class="flex-shrink-0 btn btn-primary k_web_settings_invite">
                        <strong wire:loading.remove>Inviter</strong>
                        <span wire:loading wire:target="sendInvitation">...</span>
                    </button>
                    @error('friend_email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            @if($this->pending_invitations)
            <div class="mt16">
                <p class="k_form_label">
                    {{ __('Pending Invites') }} :
                </p>
                <div class="d-block">
                    @foreach($this->pending_invitations as $invitation)
                    <a class="cursor-pointer badge rounded-pill k_web_settings_users">
                        {{ $invitation->email }}
                        <i wire:click.prevent="deleteInvitation({{ $invitation->id }})" wire:confirm="Êtes-vous sûr de vouloir annuler l'invitation de {{ $invitation->email }} ?" class="bi bi-x cancelled_icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Annuler l'invitation de {{ $invitation->email }}"></i>
                    </a>
                    @endforeach
                    <div wire:loading>
                        ......
                    </div>
                </div>
            </div>
            @endif
        </form>
    </div>

</div>                