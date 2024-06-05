@props([
    'value',
    'data'
])
@php
    $sellers = \Modules\Sales\Entities\SalesPerson::isCompany(current_company()->id)->get();
@endphp
<div class="d-flex" style="margin-bottom: 8px;">
    <!-- seller -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }} :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <select  wire:model="{{ $value->model }}" class="k_input" id="{{ $value->model }}_0" {{ $this->blocked ? 'disabled' : '' }}>
            <option value=""></option>
            @foreach ($sellers as $seller)
                <option value="{{ $seller->id }}">{{ $seller->user->name }}</option>
            @endforeach
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
