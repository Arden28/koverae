@props([
    'value',
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
        <label class="k_form_label" for="contact">
            {{ $value->label }} :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="{{ $value->model }}" id="" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            <option value="congo">République du Congo</option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
