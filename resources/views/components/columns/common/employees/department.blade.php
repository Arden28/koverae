@props([
    'value'
])
@php
    $employee = \Modules\Employee\Entities\Employee::find($value);
@endphp
@if($employee)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('employee.department.show' , ['subdomain' => current_company()->domain_name, 'department' => $employee->department->id ]) }}"  tabindex="-1">
        {{ $employee->department->name }}
    </a>
</div>
@endif
