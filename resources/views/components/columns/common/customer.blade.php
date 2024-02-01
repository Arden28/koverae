@props([
    'value',
    'id'
])
@php
    $customer = \Modules\Contact\Entities\Contact::find($value);
@endphp
@if(isset($customer))
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $customer->id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $customer->name }}
    </a>
</div>
@endif
