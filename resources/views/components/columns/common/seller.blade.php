@props([
    'value'
])
@php
    $seller = \Modules\Sales\Entities\SalesPerson::find($value);
@endphp
@if($seller)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $seller->user_id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $seller->user->name }}
    </a>
</div>
@endif
