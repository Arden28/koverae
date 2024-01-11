@props([
    'value'
])
@php
    $department = \Modules\Employee\Entities\Department::find($value);
@endphp
<div>
    {{ $department->parent->name ?? '' }}
</div>
