@props([
    'value'
])
@php
    $employee = \Modules\Employee\Entities\Employee::find($value);
@endphp
@if($employee)
<div>
    <a style="text-decoration: none" href="mailto:{{ $employee->user->email }}" tabindex="-1">
        {{ $employee->user->email }}
    </a>
</div>
@endif
