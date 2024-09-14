<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value'])
<x-blocks.boxes.input.simple :value="$value" >

{{ $slot ?? "" }}
</x-blocks.boxes.input.simple>