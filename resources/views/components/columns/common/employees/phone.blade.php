@props([
    'value'
])
@php
    $employee = \Modules\Employee\Entities\Employee::find($value);
@endphp
@if($employee)
<div>
    <a style="text-decoration: none" href="tel:{{ $employee->user->phone }}"  tabindex="-1">
        {{ $employee->user->phone }}
    </a>
</div>
@endif
