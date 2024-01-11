@props([
    'value'
])
@php
    $manager = \Modules\Employee\Entities\Employee::find($value);
@endphp
@if($manager)
<div>
    <a style="text-decoration: none" wire:navigate href="{{ route('employee.show' , ['subdomain' => current_company()->domain_name, 'employee' => $manager->id ]) }}"  tabindex="-1">
        {{ $manager->user->name }}
    </a>
</div>
@endif
