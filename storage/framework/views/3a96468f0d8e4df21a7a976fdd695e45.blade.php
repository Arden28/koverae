<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value'])
<x-form.input.checkbox.simple :value="$value" >

{{ $slot ?? "" }}
</x-form.input.checkbox.simple>