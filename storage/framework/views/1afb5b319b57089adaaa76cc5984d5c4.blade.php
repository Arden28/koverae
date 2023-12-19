<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','id'])
<x-columns.common.customer :value="$value" :id="$id" >

{{ $slot ?? "" }}
</x-columns.common.customer>