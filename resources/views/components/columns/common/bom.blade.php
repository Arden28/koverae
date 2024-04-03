@props([
    'value',
    'id'
])
@php
    $bom = \Modules\Manufacturing\Entities\BOM\BillOfMaterial::find($value);
@endphp
@if(isset($bom))
<div>
    <a style="text-decoration: none" wire:navigate href="#"  tabindex="-1">
        {{ $bom->name }}
    </a>
</div>
@endif
