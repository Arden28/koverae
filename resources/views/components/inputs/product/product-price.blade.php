@props([
    'value',
    'data'
])
@php
    $settings = settings();
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }}
            @if($value->help)
                <sup><i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="{{ $value->help }}"></i></sup>
            @endif
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="row">
            @if($settings->default_currency_position == 'prefix')
                <span class="col-6" style="width: 30%; margin: 0 0 12px 0;">{{ $settings->currency->symbol }}</span>
                <input type="{{ $value->type }}" style="width: 50%;" wire:model="{{ $value->model }}" min="0" class="k_input" placeholder="{{ $value->placeholder }}" id="amount" {{ $this->blocked ? 'disabled' : '' }}>
            @else
                <input type="{{ $value->type }}" style="width: 30%;" wire:model="{{ $value->model }}" min="0" class="k_input" placeholder="{{ $value->placeholder }}" id="amount" {{ $this->blocked ? 'disabled' : '' }}>
                <span class="col-6" style="width: 30%; margin: 0 0 12px 0;">{{ $settings->currency->symbol }}</span>
                @if($this->product && $this->product->taxes['sale'] )
                <span class="col-6" style="width: 40%; margin: 0 0 12px 0;">(= {{ format_currency(calculate_item_price($this->product)) }} {{ __('translator::components.inputs.sale-price.all-included') }})</span>
                @endif
            @endif
        </div>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

