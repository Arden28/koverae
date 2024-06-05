<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('translator::components.modals.replenish-qty.title') }}</h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        {{-- <form wire:submit="replenish">
            @csrf

        </form> --}}
        <div class="k_form_nosheet">
            <p>
                {!! __('translator::components.modals.replenish-qty.qty-statement', ['product' => $product->product_internal_reference ? '<b>['.$product->product_internal_reference.']</b>' : '<b>'.$product->product_name.'</b>', 'qty' => '<b>'.$product->product_quantity.'</b>', 'uom' => '<b>'.$product->unit->name.'</b>'])  !!}
            </p>

            <div class="mt-2 k_inner_group col-md-6 col-lg-6">

                <!-- Quantity -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('translator::components.modals.replenish-qty.qty') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <input type="text" wire:model="quantity" class="pl-0 k_input" id="quantity_0">
                        @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Schedule Date -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('translator::components.modals.replenish-qty.date') }} :
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
                            {{ __('translator::components.modals.replenish-qty.route.label') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <select wire:model.blur="route" class="k-autocomplete-input-0 k_input" id="route">
                            <option></option>
                            @if(module('purchase'))
                            <option value="purchase">{{ __('translator::components.modals.replenish-qty.route.select.buy') }}</option>
                            @endif
                            @if(module('manufacturing'))
                            <option value="manufacture">{{ __('translator::components.modals.replenish-qty.route.select.manufacture') }}</option>
                            @endif

                        </select>
                        @error('route') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                @if($this->route === 'purchase')
                <!-- Suppliers -->
                <div class="d-flex" style="margin-bottom: 8px;">
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('translator::components.modals.replenish-qty.supplier') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="k_cell k_wrap_input flex-grow-1">
                        <select wire:model="supplier" class="k-autocomplete-input-0 k_input" id="supplier">
                            <option></option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->contact->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endif

            </div>
        </div>
      </div>
      <div class="p-0 modal-footer">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')">{{ __('translator::components.modals.replenish-qty.buttons.discard') }}</button>
        <button class="btn btn-primary" wire:click.prevent="replenish">{{ __('translator::components.modals.replenish-qty.buttons.confirm') }}</button>
      </div>
    </div>
</div>
