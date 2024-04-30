<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value'])
<x-button.action-bar.simple :value="$value" >

{{ $slot ?? "" }}
</x-button.action-bar.simple>