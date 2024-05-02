@props([
    'value',
    'date'
])
<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
        <label class="k_form_label">
            {{ $value->label }} :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <input type="{{ $value->type }}" wire:model="{{ $value->model }}" class="k_input" id="date_0" {{ $this->blocked ? 'disabled' : '' }}>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
