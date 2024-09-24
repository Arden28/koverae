<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','cartInstance'])
<x-form.tab.simple :value="$value" :cartInstance="$cartInstance" >

{{ $slot ?? "" }}
</x-form.tab.simple>