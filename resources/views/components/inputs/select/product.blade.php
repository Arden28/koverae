@props([
    'value',
    'data'
])

@php
    $products = \Modules\Inventory\Entities\Product::isCompany(current_company()->id)->get();
@endphp

<div class="d-flex" style="margin-bottom: 8px; margin-top: 8px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="product">
            {{ $value->label }}
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model.change="{{ $value->model }}" id="" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    @if(strlen($value->label) > 16)
        <br />
    @endif
</div>
