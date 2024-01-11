@props([
    'value'
])
@php
    $department = \Modules\Employee\Entities\Department::find($value);
@endphp
<div>
    <span class=" cursor-pointer" style="color: #037278">{{ $department->employees()->count() }} employés</span>
</div>
