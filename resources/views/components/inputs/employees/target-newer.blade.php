@props([
    'value',
    'data'
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }}
            @if($value->help)
                <sup><i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="{{ $value->help }}"></i></sup>
            @endif :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="row">
        <input type="{{ $value->type }}" style="width: 50%;" wire:model="{{ $value->model }}" class="k_input col-6" id="date_0" {{ $this->blocked ? 'disabled' : '' }}>
            <span class="col-6" style="width: 50%; margin: 0 0 12px 0;">nouveau(x)</span>
        </div>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

