<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['value','index','input','model'])
<x-cart.columns.column :value="$value" :index="$index" :input="$input" :model="$model" >

{{ $slot ?? "" }}
</x-cart.columns.column>