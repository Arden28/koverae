@props([
    'value',
    'data'
])

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">
        <label class="k_form_label">
            {{ $value->label }} 
            @if($value->help)
                <sup><i class="bi bi-question-circle-fill text cursor-pointer" style="color: #01585C;" data-toggle="tooltip" data-placement="top" title="{{ $value->help }}"></i></sup>
            @endif :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow">
        <div class="row">
        <input type="{{ $value->type }}" style="width: 75%;" wire:model="{{ $value->model }}" class="k_input col-8" id="date_0">
            <span class="col-4" style="width: 25%; margin: 0 0 12px 0;"> / Mois</span>
        </div>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

