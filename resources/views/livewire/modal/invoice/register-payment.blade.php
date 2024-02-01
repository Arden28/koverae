<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payInvoiceModalLabel">{{ __('Enregistrer un paiement') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="proceedPayment({{ $invoice['id'] }})">
          @csrf
          <div class="modal-body">
            <div class="k_form_nosheet">
                <div class="row">

                    <div class="k_inner_group col-md-6 col-lg-6">

                        <!-- Journal -->
                        <div class="d-flex" style="margin-bottom: 8px;">
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Journal") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <select wire:model="journal" class="k-autocomplete-input-0 k_input" id="journal">
                                    <option></option>
                                    @foreach ($journals as $j)
                                    <option value="{{ $j->id }}">{{ $j->name }}</option>
                                    @endforeach

                                </select>
                                @error('journal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Payment method -->
                        <div class="d-flex" style="margin-bottom: 8px;">
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Mode de paiement") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <select wire:model="payment_method" class="k-autocomplete-input-0 k_input" id="payment_method_id_0">
                                    <option></option>
                                    <option selected value="manual">{{ __('Manuel') }}</option>
                                </select>
                                @error('payment_method') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <!-- Amount -->
                        <div class="d-flex" style="margin-bottom: 8px;">
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
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

                        <!-- Payment Date -->
                        <div class="d-flex" style="margin-bottom: 8px;">
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __("Date de règlement") }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="date" wire:model="payment_date" class="k_input" style="padding-left: 5px;" id="payment_date_0">
                                @error('payment_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Payment Reference -->
                        <div class="d-flex" style="margin-bottom: 8px;">
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
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
                <button type="submit" wire:taget="proceedPayment({{ $invoice['id'] }})"  style="background-color: black;" class="btn btn-dark">
                    {{ __('Créer un paiement') }} <span wire:loading>...</span>
                </button>
          <button type="button" wire:click="cancelPayment()" style="background-color: gray;" class="btn btn-secondary" data-bs-dismiss="modal">Ignorer</button>
          </div>
      </form>
    </div>
</div>
