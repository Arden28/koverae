@props([
    'value',
    'id'
])

<div>
    <a style="text-decoration: none" wire:navigate href="{{ $this->showRoute($id) }}"  tabindex="-1">
        {{ $value }}
    </a>
</div>
