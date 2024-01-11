@props([
    'value'
])
@php
    $category = \Modules\Inventory\Entities\Category::find($value);
@endphp
<div>
    <a style="text-decoration: none" wire:navigate href="#"  tabindex="-1">
        {{ $category->category_name }}
    </a>
</div>
