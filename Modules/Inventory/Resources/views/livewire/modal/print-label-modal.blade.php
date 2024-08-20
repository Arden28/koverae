<div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">{{ __('translator::components.modals.print-label.title') }}</h5>
        <span class="btn-close" wire:click="$dispatch('closeModal')"></span>
      </div>
      <div class="modal-body">
        {{-- <form wire:submit="replenish">
            @csrf

        </form> --}}
        <div class="k_form_nosheet">
            <div class="row">
                <div class="mt-2 k_inner_group col-md-6 col-lg-6">

                    <!-- Quantity -->
                    <div class="d-flex" style="margin-bottom: 8px;">
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('translator::components.modals.print-label.qty') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <input type="text" wire:model="quantity" class="pl-0 k_input" id="quantity_0">
                            @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Format -->
                    <div class="d-flex" style="margin-bottom: 8px;">
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('translator::components.modals.print-label.format.label') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <select wire:model.blur="format" class="k-autocomplete-input-0 k_input" id="format">
                                <option></option>
                                <option value="dymo">{{ __('translator::components.modals.print-label.format.select.dymo') }}</option>
                                <option value="2x7">{{ __('translator::components.modals.print-label.format.select.2x7') }}</option>
                                <option value="4x7">{{ __('translator::components.modals.print-label.format.select.4x7') }}</option>
                                <option value="zpl">{{ __('translator::components.modals.print-label.format.select.zpl') }}</option>

                            </select>
                            @error('format') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </div>

                <div class="mt-2 k_inner_group col-md-6 col-lg-6">
                    <!-- Pricelist -->
                    <div class="d-flex" style="margin-bottom: 8px;">
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('translator::components.modals.print-label.pricelist.label') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="k_cell k_wrap_input flex-grow-1">
                            <select wire:model.blur="pricelist" class="k-autocomplete-input-0 k_input" id="pricelist">
                                <option></option>
                                @foreach($pricelists as $pricelist)
                                <option value="{{ $pricelist->id }}">{{ $pricelist->name }}</option>
                                @endforeach

                            </select>
                            @error('pricelist') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!-- Extra Content -->
                    <div class="d-flex" style="margin-bottom: 8px;">
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                {{ __('translator::components.modals.print-label.extra') }} :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input ">
                            <input type="text" wire:model.blur="extra" class="k_input">
                            @error('extra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="p-0 modal-footer">
        <button class="btn btn-secondary" wire:click="$dispatch('closeModal')">{{ __('translator::components.modals.print-label.buttons.discard') }}</button>
        <button class="btn btn-primary" wire:click.prevent="print">{{ __('translator::components.modals.print-label.buttons.confirm') }}</button>
      </div>
    </div>
</div>
