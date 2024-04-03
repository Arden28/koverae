@props([
    'value',
    'data'
])


<div class="d-flex" style="margin-bottom: 15px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="bom">
            {{ $value->label }}
            @if($value->help)
                <sup><i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="{{ $value->help }}"></i></sup>
            @endif
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <select  wire:model="{{ $value->model }}" class="k_input" id="{{ $value->model }}_0">
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
