<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','date'])
<x-inputs.ask-confirmation :value="$value" :date="$date" >

{{ $slot ?? "" }}
</x-inputs.ask-confirmation>