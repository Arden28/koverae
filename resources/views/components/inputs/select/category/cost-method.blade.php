@props([
    'value',
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Payment Terms -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900" style="width: auto;">
        <label class="k_form_label">
            {{ $value->label }} :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" class="k-autocomplete-input-0 k_input" id="company_id_0" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            <option value="standard">{{ __('translator::components.inputs.cost-method.select.standard') }}</option>
            <option value="fifo">{{ __('translator::components.inputs.cost-method.select.fifo') }}</option>
            <option value="avco">{{ __('translator::components.inputs.cost-method.select.avco') }}</option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
