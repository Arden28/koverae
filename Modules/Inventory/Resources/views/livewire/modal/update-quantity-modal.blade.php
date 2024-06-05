<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">
            {!! __('translator::components.modals.update-qty.title', ['product' => $product->product_internal_reference ? '<b>['.$product->product_internal_reference.']</b>' : '<b>'.$product->product_name.'</b>']) !!}
        </h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        {{-- <form wire:submit="replenish">
            @csrf

        </form> --}}
        <div class="k_form_nosheet">
            <p>
                {!! __('translator::components.modals.update-qty.qty-statement', ['product' => $product->product_internal_reference ? '<b>['.$product->product_internal_reference.']</b>' : '<b>'.$product->product_name.'</b>', 'qty' => '<b>'.$product->product_quantity.'</b>', 'uom' => '<b>'.$product->unit->name.'</b>'])  !!}
            </p>

            <div class="mt-2 k_inner_group col-md-12 col-lg-12">

                <!-- Quantity -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('translator::components.modals.update-qty.qty') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model="quantity" class="pl-0 k_input" id="quantity_0">
                        @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>
        </div>
      </div>
      <div class="p-0 modal-footer">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')">{{ __('translator::components.modals.update-qty.buttons.discard') }}</button>
        <button class="btn btn-primary" wire:click.prevent="updateQty">{{ __('translator::components.modals.update-qty.buttons.apply') }}</button>
      </div>
    </div>
</div>
