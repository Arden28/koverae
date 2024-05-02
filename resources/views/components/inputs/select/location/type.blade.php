@props([
    'value',
    'data'
])

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
            <option value="view">Vue</option>
            <option value="supplier">Emplacement fournisseur</option>
            <option value="customer">Emplacement client</option>
            <option value="internal">Emplacement interne</option>
            <option value="loss_inventory">Perte d'inventaire</option>
            <option value="transit">Emplacement de transit</option>
            <option value="production">Production</option>
        </select>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
