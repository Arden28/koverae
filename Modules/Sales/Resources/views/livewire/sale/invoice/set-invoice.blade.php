<div>
    <!-- Modal -->
    <div class="modal fade" wire:ignore id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('Générer une facture') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="k_wrap_label text-break text-900">
                <label class="k_form_label">
                    {{ __('Créer une facture') }}
                </label>
            </div>
            <div class="k_inner_group">
                <div class="k_cell k_wrap_input flex-grow-1">
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" value="1" wire:model="regular" id="regular" />
                        <label class="form-check-label k_form_label" for="regular">
                            {{ __('Facture régulière') }}
                        </label>
                    </div>

                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" value="1" wire:model="down_percentage" id="down_percentage" />
                        <label class="form-check-label k_form_label" for="down_percentage">
                            {{ __('Acompte (pourcentage)') }}
                        </label>
                    </div>

                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" value="1" wire:model="down_amount" id="down_amount" />
                        <label class="form-check-label k_form_label" for="down_amount">
                            {{ __('Acompte (montant fixe)') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="k_inner_group">

                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Montant de l'acompte") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model="down_payment" class="k_input" id="down_payment_0" >
                        @error('down_payment') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Payment Terms -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Compte de revenue") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-grow-1">
                        <select wire:model="income_account_id" class="k-autocomplete-input-0 k_input" id="company_id_0">
                            <option></option>
                        </select>
                        @error('income_account_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="d-flex" style="margin-bottom: 8px;">
                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Taxe") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model="customer_tax" class="k_input" id="customer_tax_0" >
                        @error('customer_tax') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" style="background-color: gray;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" style="background-color: black;" class="btn btn-dark">{{ __('Créer un brouillon') }}</button>
          </div>
        </div>
      </div>
    </div>
</div>
