<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','id'])
<x-table.column.special.show-title-link :value="$value" :id="$id" >

{{ $slot ?? "" }}
</x-table.column.special.show-title-link>