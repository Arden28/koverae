<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __("Pas assez en stock ?") }}</h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        <div class="k_form_nosheet">
            <p>
                La quantité actuelle de {{ $product->reference ? '['.$product->reference.']' : '' }} <b>{{ $product->product_name }}</b> est de {{ $product->product_quantity }} {{ $product->unit->name }}
            </p>

            <div class="k_inner_group col-md-6 col-lg-6 mt-2">

                <!-- Quantity -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Quantité") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model="quantity" class="k_input pl-0" id="quantity_0">
                        @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Schedule Date -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Date prévue") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="datetime-local" wire:model="schedule_date" class="k_input" style="padding-left: 5px;" id="schedule_date_0">
                        @error('schedule_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Route -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Route à emprunter") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <select wire:model="route" class="k-autocomplete-input-0 k_input" id="route">
                            <option></option>
                            <option value="purchase">{{ __('Acheter') }}</option>
                            @if(module('manufacturing'))
                            <option value="manufacture">{{ __('Fabriquer') }}</option>
                            @endif

                        </select>
                        @error('route') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Suppliers -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __("Fournisseur") }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <select wire:model="supplier" class="k-autocomplete-input-0 k_input" id="supplier">
                            <option></option>
                        </select>
                        @error('supplier') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')">Close</button>
        <button class="btn btn-primary">Send message</button>
      </div>
    </div>
</div>
