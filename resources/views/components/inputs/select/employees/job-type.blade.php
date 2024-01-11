@props([
    'value',
])

@php
    $job_types = \Modules\Employee\Entities\JobType::isCompany(current_company()->id)->get();
    $employees = \Modules\Employee\Entities\Employee::isCompany(current_company()->id)->get();
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Job Title -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="employee">
            {{ $value->label }} :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" id="" class="k_input">
            <option value=""></option>
            @foreach($job_types as $type)
            <option value="{{ $type->id }}">{{ $type->title }}</option>
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
{{-- @if(strlen($value->label) > 15)
    <br />
@endif --}}
