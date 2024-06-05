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
        <select wire:model="{{ $value->model }}" class="k-autocomplete-input-0 k_input" id="{{ $value->model }}_0" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            <option value="employee">
                {{ __('Employé(e)') }}
            </option>
            <option value="interim">
                {{ __('Intérimaire') }}
            </option>
            <option value="student">
                {{ __('Etudiant(e)') }}
            </option>
            <option value="intern">
                {{ __('Stagiaire') }}
            </option>
            <option value="contractor">
                {{ __('Contractant') }}
            </option>
            <option value="freelance">
                {{ __('Travailleur indépendant') }}
            </option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
