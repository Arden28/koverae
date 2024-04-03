@props([
    'value'
])
@php
    $employee = \Modules\Employee\Entities\Employee::find($value);
@endphp
@if($employee->department)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('employee.department.show' , ['subdomain' => current_company()->domain_name, 'department' => $employee->department->id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $employee->department->name }}
    </a>
</div>
@endif
