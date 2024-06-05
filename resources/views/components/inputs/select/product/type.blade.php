@props([
    'value',
    'data'
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- seller -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }}
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <select  wire:model.blur="{{ $value->model }}" class="k_input" id="{{ $value->model }}_0" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            <option value="storable">{{ __('translator::components.inputs.product-type.select.storable') }}</option>
            <option value="consumable">{{ __('translator::components.inputs.product-type.select.consumable') }}</option>
            <option value="service">{{ __('translator::components.inputs.product-type.select.service') }}</option>
            <option value="booking_fee">{{ __('translator::components.inputs.product-type.select.booking-fee') }}</option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
