<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">
            {{ __("Mettre à jour la quantité de ") }} <b>{{ $product->product_internal_reference ? '['.$product->product_internal_reference.']' : $product->product_name }}</b>
        </h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        {{-- <form wire:submit="replenish">
            @csrf

        </form> --}}
        <div class="k_form_nosheet">
            <p>
                La quantité actuelle de <b>{{ $product->product_internal_reference ? '['.$product->product_internal_reference.']' : $product->product_name }}</b> est de <b>{{ $product->product_quantity }} {{ $product->unit->name }}</b>
            </p>

            <div class="k_inner_group col-md-12 col-lg-12 mt-2">

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

            </div>
        </div>
      </div>
      <div class="modal-footer p-0">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')">{{ __('Ignorer') }}</button>
        <button class="btn btn-primary" wire:click.prevent="updateQty">{{ __('Confirmer') }}</button>
      </div>
    </div>
</div>
