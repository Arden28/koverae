@props([
    'value',
    'data'
])
<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
        <label class="k_form_label">
            {{ $value->label }}
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="row">
        <input type="{{ $value->type }}" style="width: 50%;" wire:model="{{ $value->model }}" class="k_input col-6" id="date_0">
            <span class="col-6" style="width: 50%; margin: 0 0 12px 0;">m³</span>
        </div>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

