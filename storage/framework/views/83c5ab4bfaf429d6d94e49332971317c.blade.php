<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value'])
<x-inputs.product.comment-type-product :value="$value" >

{{ $slot ?? "" }}
</x-inputs.product.comment-type-product>