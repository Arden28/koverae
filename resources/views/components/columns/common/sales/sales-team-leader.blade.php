@props([
    'value'
])
@php
    $leader = \Modules\Sales\Entities\SalesPerson::find($value);
@endphp
@if($leader)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('contacts.show' , ['subdomain' => current_company()->domain_name, 'contact' => $leader->user->id ]) }}"  tabindex="-1">
        {{ $leader->user->name }}
    </a>
</div>
@endif
