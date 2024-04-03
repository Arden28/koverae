@props([
    'value',
])
@php
    $pos = \Modules\Pos\Entities\Pos\Pos::find($value);
@endphp
<div>
    <a wire:navigate href="{{ route('pos.show', ['pos' => $pos->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()]) }}"class=" text-decoration-none">
        {{ $pos->name }}
    </a>
</div>
