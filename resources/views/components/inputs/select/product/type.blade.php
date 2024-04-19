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
        <select  wire:model.blur="product_type" class="k_input" id="{{ $value->model }}_0">
            <option value=""></option>
            <option value="storable">Produit stockable</option>
            <option value="consumable">Consommable</option>
            <option value="service">Service</option>
            <option value="booking_fee">Frais de réservation</option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
