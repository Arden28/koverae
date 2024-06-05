@props([
    'value',
])

@php
    $roles = \Spatie\Permission\Models\Role::where('company_id', current_company()->id)->get();
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Langue -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="employee">
            {{ $value->label }} :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" id="" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
{{-- @if(strlen($value->label) > 15)
    <br />
@endif --}}
