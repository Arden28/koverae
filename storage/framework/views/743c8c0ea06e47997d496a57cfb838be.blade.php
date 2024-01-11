<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','id'])
<x-columns.common.status.sale-invoice-status :value="$value" :id="$id" >

{{ $slot ?? "" }}
</x-columns.common.status.sale-invoice-status>