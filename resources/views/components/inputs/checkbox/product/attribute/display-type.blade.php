@props([
    'value',
    'data'
])

<div class="d-flex h-100" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
        <label class="k_form_label">
            {{ $value->label }}
            @if($value->help)
                <sup><i class="bi bi-question-circle-fill" style="color: #0E6163" data-toggle="tooltip" data-placement="top" title="{{ $value->help }}"></i></sup>
            @endif
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="w-auto k_field_widget k_field_text k_read_only modify ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
            <!-- What is ordered -->
            <div>
                <div class="form-check k_radio_item">
                    <input type="radio" class="form-check-input k_radio_input" wire:model.blur="{{ $value->model }}" name="{{ $value->model }}" id="ordered" value="ordered" {{ $this->blocked ? 'disabled' : '' }}/>
                    <label class="form-check-label k_form_label" for="ordered">
                        {{ __('Facturer ce qui est commandé') }}
                    </label>
                </div>
            </div>
            <!-- What is delivered -->
            <div>
                <div class="form-check k_radio_item">
                    <input type="radio" class="form-check-input k_radio_input" wire:model.blur="{{ $value->model }}" name="{{ $value->model }}" id="delivered" value="delivered" {{ $this->blocked ? 'disabled' : '' }}/>
                    <label class="form-check-label k_form_label" for="delivered">
                        {{ __('Facturer ce qui est livré') }}
                    </label>
                </div>
            </div>
        </div>
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

