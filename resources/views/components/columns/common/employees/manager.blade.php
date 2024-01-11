@props([
    'value'
])
@php
    $employee = \Modules\Employee\Entities\Employee::find($value);
@endphp
@if($employee && $employee->manager_id)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('employee.jobs.show' , ['subdomain' => current_company()->domain_name, 'job' => $employee->job->id ]) }}"  tabindex="-1">
        {{ $employee->manager->user->name }}
    </a>
</div>
@endif
