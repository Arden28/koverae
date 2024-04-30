<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','cartInstance'])
<x-tabs.attribute-value :value="$value" :cartInstance="$cartInstance" >

{{ $slot ?? "" }}
</x-tabs.attribute-value>