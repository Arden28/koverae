@props([
    'value',
])

@php
    $schedules = \Modules\Employee\Entities\WorkSchedule::isCompany(current_company()->id)->get();
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="employee">
            {{ $value->label }} :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" id="" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            @foreach($schedules as $schedule)
            <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
{{-- @if(strlen($value->label) > 15)
    <br />
@endif --}}
