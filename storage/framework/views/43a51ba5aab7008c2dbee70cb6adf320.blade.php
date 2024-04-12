<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value'])
<x-inputs.select.operations.operation-type :value="$value" >

{{ $slot ?? "" }}
</x-inputs.select.operations.operation-type>