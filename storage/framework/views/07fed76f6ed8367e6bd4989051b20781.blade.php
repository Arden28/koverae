<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value'])
<x-koverae-ui-builder::form.input.ke-title :value="$value" >

{{ $slot ?? "" }}
</x-koverae-ui-builder::form.input.ke-title>