@props([
    'value'
])
@php
    $employee = \Modules\Employee\Entities\Employee::find($value);
@endphp
@if($employee->job)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('employee.jobs.show' , ['subdomain' => current_company()->domain_name, 'job' => $employee->job->id, 'menu' => current_menu() ]) }}"  tabindex="-1">
        {{ $employee->job->title }}
    </a>
</div>
@endif
