<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">{{ __('Enregistrer un paiement') }}</h4>
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
      </div>
      <form wire:submit.prevent="registerPayment({{ $invoice->id }})">
        <div class="modal-body position-relative">
          <div class="k_form_renderer k_form_sheet">

            <div class="row">

                <div class="k_inner_group col-md-6 col-lg-6">

                    <div class="d-flex" style="margin-bottom: 8px;">
                        <!-- Date -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                {{ __("Journal") }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <select wire:model="journal" class="k-autocomplete-input-0 k_input" id="journal">
                                <option value=""></option>
                                @foreach ($journals as $j)
                                <option {{ $j->id == 1 ? 'selected' : '' }} value="{{ $j->id }}">{{ $j->name }}</option>
                                @endforeach

                            </select>
                            @error('journal') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="d-flex" style="margin-bottom: 8px;">
                        <!-- Payment Terms -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                {{ __("Mode de paiement") }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <select wire:model="invoice_payment_method" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                <option value=""></option>
                                <option selected value="manual">{{ __('Manuel') }}</option>
                            </select>
                            @error('invoice_payment_method') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </div>
                <!-- Left -->
                <div class="k_inner_group col-md-6 col-lg-6">

                    <div class="d-flex" style="margin-bottom: 8px;">
                        <!-- Payment Reference -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                {{ __("Montant") }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <input type="text" wire:model="amount" class="k_input" id="amount_0">
                            @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="d-flex" style="margin-bottom: 8px;">
                        <!-- Payment Reference -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                {{ __("Date de paiement") }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <input type="date" wire:model="payment_date" class="k_input" id="payment_date_0">
                            @error('payment_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="d-flex" style="margin-bottom: 8px;">
                        <!-- Payment Reference -->
                        <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                            <label class="k_form_label">
                                {{ __("Memo") }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <input type="text" wire:model="payment_note" class="k_input" id="payment_note_0">
                            @error('payment_note') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
          <footer>
              <button type="submit" wire:target="registerPayment({{ $invoice->id }})" class="btn btn-primary">Envoyer <p wire:loading wire:target="registerPayment({{ $invoice->id }})">...</p></button>

              <button class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          </footer>
        </div>
      </form>
    </div>
</div>
