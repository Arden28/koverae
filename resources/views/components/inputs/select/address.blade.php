@props([
    'value',
])

<div class="d-flex" style="margin-bottom: 8px;">
    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }} :
        </label>
    </div>
    <div class="k_address_format">
        <div class="row">
            <div class="col-12" style="margin-bottom: 10px;">
                <input type="text" wire:model="street" id="street" class="k_input" placeholder="Rue 1....">
            </div>
            <div class="col-12" style="margin-bottom: 10px;">
                <input type="text" wire:model="street2" id="street2_0" class="k_input" placeholder="Rue 2......">
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <input type="text" wire:model="city" id="city_0" class="k_input" placeholder="Ville">
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <select name="" class="k_input" id="state_id_0">
                    <option value="">{{ __('Département') }}</option>
                </select>
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <input type="text" wire:model="zip" id="zip_0" class="k_input" placeholder="Code postal">
            </div>
            <div class="col-12" style="margin-bottom: 10px;">
                <select name="" class="k_input" id="country_id_0">
                    <option value="">{{ __('Pays') }}</option>
                </select>
            </div>

        </div>

    </div>
</div>
