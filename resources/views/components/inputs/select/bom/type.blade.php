@props([
    'value',
    'data'
])


<div class="d-flex" style="margin-bottom: 15px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="bom">
            {{ $value->label }}
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="mt16">
            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
                <!-- Manufacture -->
                <div>
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" wire:model="{{ $value->model }}" name="{{ $value->model }}" id="manufacture" value="manufacture"/>
                        <label class="form-check-label k_form_label" for="manufacture">
                            {{ __('Fabriquer ce produit') }}
                        </label>
                    </div>
                </div>
                <!-- Kit -->
                <div>
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" wire:model="{{ $value->model }}" name="{{ $value->model }}" id="kit" value="kit"/>
                        <label class="form-check-label k_form_label" for="kit">
                            {{ __('Kit') }}
                        </label>
                    </div>
                </div>
                <!-- Subcontracting -->
                <div>
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" wire:model="{{ $value->model }}" name="{{ $value->model }}" id="subcontracting" value="subcontracting"/>
                        <label class="form-check-label k_form_label" for="subcontracting">
                            {{ __('Sous-traitant') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
