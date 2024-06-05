@props([
    'value',
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }}
            @if($value->help)
                <sup><i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="{{ $value->help }}"></i></sup>
            @endif
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <input type="{{ $value->type }}" wire:model="{{ $value->model }}" class="k_input" id="date_0" {{ $this->blocked ? 'disabled' : '' }}>
        <button type="button" class="btn btn-link">
             {{ __('Afficher') }} <span wire:loading wire:target="generateCypher">...</span>
        </button>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

