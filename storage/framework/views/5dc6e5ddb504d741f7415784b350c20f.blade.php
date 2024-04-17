<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','status'])
<x-capsules.sale.delivery :value="$value" :status="$status" >

{{ $slot ?? "" }}
</x-capsules.sale.delivery>