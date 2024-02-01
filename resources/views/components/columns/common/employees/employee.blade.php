@props([
    'value'
])
@php
    $employee = \Modules\Employee\Entities\Employee::find($value);
@endphp
@if($employee)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('employee.show' , ['subdomain' => current_company()->domain_name, 'employee' => $employee->id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $employee->user->name }}
    </a>
</div>
@endif
