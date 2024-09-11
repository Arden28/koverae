<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value'])
<x-blocks.boxes.template.developer :value="$value" >

{{ $slot ?? "" }}
</x-blocks.boxes.template.developer>