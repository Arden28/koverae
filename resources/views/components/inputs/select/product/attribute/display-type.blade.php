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
        <select  wire:model.blur="{{ $value->model }}" class="k_input" id="{{ $value->model }}_0">
            <option value=""></option>
            <option value="radio">{{ __('Radio') }}</option>
            {{-- <option value="square_button">Boutton carré</option> --}}
            <option value="select">{{ __('Selectionner') }}</option>
            <option value="color">{{ __('Couleurs') }}</option>
            <option value="multiple_checkboxes" >{{ __("Multiples cases à cocher (option)") }}</option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
