@props([
    'value',
    'status'
])
<div>
    <button type="button" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}"  id="top-button" class="btn btn-primary {{ $status == $value->primary ? 'primary' : '' }}">
        <span>
            {{ $value->label }} <p wire:loading wire:target="{{ $value->action }}">...</p>
        </span>
    </button>

    <!-- Dropdown button -->
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Action
        </button>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">{{ __('Confirmer') }}</a></li>
        <li><a class="dropdown-item" href="#">{{ __('Envoyer par email') }}</a></li>
        <li><a class="dropdown-item" href="#">{{ __('Aperçu') }}</a></li>
        @if($status == 'sent')
        <li><a class="dropdown-item" href="#">{{ __('Annuler') }}</a></li>
        @endif
        <!--<li><hr class="dropdown-divider"></li>-->
        </ul>
    </div>
</div>
