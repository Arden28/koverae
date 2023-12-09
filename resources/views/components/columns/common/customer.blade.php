@props([
    'value'
])
@php
    $customer = \Modules\Contact\Entities\Contact::find($value);
@endphp
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $customer->id ]) }}"  tabindex="-1">
        {{ $customer->name }}
    </a>
</div>
