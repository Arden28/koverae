@props([
    'value',
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Payment Terms -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }} :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" class="k-autocomplete-input-0 k_input" id="company_id_0" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            <option selected value="immediate_payment">{{ __('Paiement Immédiat') }}</option>
            <option value="7_days">{{ __('7 Jours') }}</option>
            <option value="15_days">{{ __('15 Jours') }}</option>
            <option value="21_days">{{ __('21 Jours') }}</option>
            <option value="30_days">{{ __('30 Jours') }}</option>
            <option value="45_days">{{ __('45 Jours') }}</option>
            <option value="end_of_next_month">{{ __('Fin du mois suivant') }}</option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
