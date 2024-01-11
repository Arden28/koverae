@props([
    'value',
])

@php
    $departments = \Modules\Employee\Entities\Job::isCompany(current_company()->id)->get();
    $employees = \Modules\Employee\Entities\Employee::isCompany(current_company()->id)->get();
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="employee">
            {{ $value->label }} :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" id="" class="k_input">
            <option value=""></option>
            @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
{{-- @if(strlen($value->label) > 15)
    <br />
@endif --}}
