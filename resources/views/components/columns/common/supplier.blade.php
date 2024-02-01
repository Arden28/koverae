@props([
    'value'
])
@php
    $supplier = \Modules\Contact\Entities\Contact::find($value);
@endphp
@if($supplier)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $supplier->id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $supplier->name }}
    </a>
</div>
@endif
