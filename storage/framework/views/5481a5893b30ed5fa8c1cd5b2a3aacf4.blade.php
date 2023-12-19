<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','date'])
<x-inputs.select.payment_term :value="$value" :date="$date" >

{{ $slot ?? "" }}
</x-inputs.select.payment_term>