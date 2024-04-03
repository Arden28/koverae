@props([
    'value',
    'id'
])
@php
    $product = \Modules\Inventory\Entities\Product::find($value);
@endphp
@if(isset($product))
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('inventory.products.show' , ['subdomain' => current_company()->domain_name, 'product' => $product->id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $product->product_name }}
    </a>
</div>
@endif
