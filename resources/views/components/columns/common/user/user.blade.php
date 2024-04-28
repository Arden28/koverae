@props([
    'value',
    'id'
])
@php
    $user = \App\Models\User::find($value);
@endphp
@if(isset($user))
<div>
    <a style="text-decoration: none" wire:navigate href="#"  tabindex="-1">
        {{ $user->name }}
    </a>
</div>
@endif
