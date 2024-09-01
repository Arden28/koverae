@props([
    'value'
])
<div class="k_field_widget k_field_radio k_light_label ps-3">
    <div class="k_horizontal">
        @foreach($value->data as $option)
        <div class="form-check k_radio_item">
            <input type="{{ $value->type }}" class="form-check-input" name="{{ $value->model }}" wire:model.blur="{{ $value->model }}" id="{{ $option['value'] }}" value="{{ $option['value'] }}"/>
            <label class="form-check-label k_form_label" for="{{ $option['value'] }}">
                {{ $option['label'] }}
            </label>
        </div>
        @endforeach
    </div>
</div>