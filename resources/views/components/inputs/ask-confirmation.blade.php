@props([
    'value',
    'data'
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">

    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="k_field_widget k_field_boolean">
            <div class="k-checkbox form-check d-inline-block">
                <input type="checkbox" wire:model="{{ $value->model }}" class="form-check-input">
            </div>
            @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <span>{{ $value->label }}</span>
        @if(!$value->model)
            &nbsp;&nbsp;
            <input type="text" wire:model="reminder_date_before_receipt" value="0" min="0" class="k_input" id="reminder_date_before_receipt_0" {{ $this->blocked ? 'disabled' : '' }}>
            &nbsp;&nbsp;
            jour(s) avant
        @endif

    </div>
</div>

