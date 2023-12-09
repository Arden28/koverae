@props([
    'value'
])
@php
    $sales_team = \Modules\Sales\Entities\SalesTeam::find($value);
@endphp
@if($sales_team)
    <div>
        {{ $sales_team->name }}
    </div>
@endif
