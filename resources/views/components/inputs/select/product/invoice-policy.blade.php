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
            @if($this->product_type == 'storable' || $this->product_type == 'consumable')
                <option value="delivered">{{ __('translator::components.inputs.invoicing-policy.select.delivered') }}</option>
                <option value="ordered">{{ __('translator::components.inputs.invoicing-policy.select.ordered') }}</option>
            @else
                <option value="prepaid">{{ __('translator::components.inputs.invoicing-policy.select.prepaid') }}</option>
                <option value="ordered">{{ __('translator::components.inputs.invoicing-policy.select.ordered') }}</option>
            @endif
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<br />
