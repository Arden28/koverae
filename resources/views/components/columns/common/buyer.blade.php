@props([
    'value'
])
@php
    $buyer = \Modules\Contact\Entities\Contact::find($value);
@endphp
@if($buyer)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $buyer->id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $buyer->name }}
    </a>
</div>
@endif
