@props([
    'value'
])
@php
    $responsible = \Modules\Contact\Entities\Contact::find($value);
@endphp
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $responsible->id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $responsible->name }}
    </a>
</div>
