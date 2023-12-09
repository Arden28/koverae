@props([
    'value',
    'status'
])
<div>
    <li>
        <a class="dropdown-item cursor-pointer" wire:click="{{ $value->action }}" wire:target="{{ $value->action }}">
            {!! $value->label !!}
        </a>
    </li>
    {{-- <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> {{ __('Supprimer') }}</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">{{ __('Générer un lien de paiement') }}</a></li>
    <li><a class="dropdown-item" href="#">{{ __('Partager') }}</a></li>
    <li><a class="dropdown-item" href="#">{{ __('Changer de client') }}</a></li> --}}
</div>
