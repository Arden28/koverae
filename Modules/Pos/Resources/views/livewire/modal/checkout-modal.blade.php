<div>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-break">Paiement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form wire:submit="createPos">
        @csrf
        <div class="modal-body position-relative">
          <div class="k_form_nosheet">
              <div class="row">

                  <div class="k_inner_group col-md-6 col-lg-6">

                      <!-- Journal -->
                      <div class="d-flex" style="margin-bottom: 8px;">
                          <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                              <label class="k_form_label">
                                  {{ __("Moyen de paiement") }} :
                              </label>
                          </div>
                          <!-- Input Form -->
                          <div class="k_cell k_wrap_input flex-grow-1">
                              <select wire:model="payment_method" class="k-autocomplete-input-0 k_input" id="journal">
                                  <option>Cash</option>

                              </select>
                              @error('journal') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                      </div>

                      <!-- Payment method -->
                      <div class="d-flex" style="margin-bottom: 8px;">
                          <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                              <label class="k_form_label">
                                  {{ __("Montant Total") }} :
                              </label>
                          </div>
                          <!-- Input Form -->
                          <div class="k_cell k_wrap_input flex-grow-1">
                              <input type="hidden" wire:model="total">
                              <input wire:model="total_amount" class="k-autocomplete-input-0 k_input" readonly id="total_amount_id_0">
                              @error('total_amount') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                      </div>

                  </div>
                  <div class="k_inner_group col-md-6 col-lg-6">

                      <!-- Amount -->
                      <div class="d-flex" style="margin-bottom: 8px;">
                          <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                              <label class="k_form_label">
                                  {{ __("Montant reçu") }} :
                              </label>
                          </div>
                          <!-- Input Form -->
                          <div class="k_cell k_wrap_input flex-grow-1">
                              <input type="text" wire:model.blur="received_amount" class="k_input" style="width: 50%;" id="received_amount_0">
                              <span style="width: 50%;">{{ $this->received_amount >= $this->total ? 'Monnaie' : 'Reste' }}  : {{ format_currency($this->change_amount) }}</span>
                              @error('received_amount') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                      </div>

                  </div>

              </div>
          </div>
        </div>
        <div class="modal-footer justify-content-around justify-content-sm-start flex-wrap gap-1 w-100">
          <footer>
              {{-- <a wire:navigate href="{{ route('pos.ui.payment', ['subdomain' => current_company()->domain_name,  'pos' => $this->pos->id, 'session' => $pos->sessions()->isOpened()->first()->unique_token]) }}" class="btn btn-primary" data-dismiss="modal">Valider</a> --}}
              <button type="submit" class="btn btn-primary" data-dismiss="modal">Valider</button>
          </footer>
        </div>
      </form>
    </div>
</div>
