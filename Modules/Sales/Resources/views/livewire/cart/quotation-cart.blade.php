<div>
    <!-- Table -->
    <div class="table-responsive card">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort">{{ __('Produit') }}</button></th>
                    <th><button class="table-sort">{{ __('Description') }}</button></th>
                    <th><button class="table-sort">{{ __('Quantité') }}</button></th>
                    <th><button class="table-sort">{{ __('Prix unitaire') }}</button></th>
                    <th><button class="table-sort">{{ __('Hors taxes') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inputs as $index => $value)
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <select wire:model.lazy="inputs.{{ $index }}.product" id="" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                            <option value=""></option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        @error("inputs.{{ $index }}.product") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list">
                        <input type="text" wire:model.lazy="inputs.{{ $index }}.description" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="k_field_list">
                        <input type="number" class="k_input" wire:model.lazy="inputs.{{ $index }}.quantity" wire:change="updateSubtotal({{ $index }})" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="k_field_list">
                        <input type="text" wire:model.lazy="inputs.{{ $index }}.price" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="k_field_list">
                        <input type="text" wire:model.lazy="inputs.{{ $index }}.subtotal" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="k_field_list cursor-pointer {{ $this->blocked ? 'd-none' : '' }}">
                        <span wire:click.prevent="remove({{$index}})">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                @endforeach
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add({{$i}})" class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter une ligne
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Note and total part -->
    <div class="k_group row align-items-start mt-2">

        <div class="k_inner_group col-lg-10">
            <div class="k_cell flex-grow-0 flex-sm-grow-0">
                <div class="note-editable" id="note_1">
                    <textarea wire:model="term" id="term" style="width: 75%; padding-left: 5px; padding-top:10px;" id="" cols="30" rows="5" class="k_input textearea" placeholder="Termes & conditions">
                        {!! $term !!}
                    </textarea>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="k_inner_group k_subtotal_footer col-lg-2 right overflow-y-auto h-100">
            <!-- Discount -->
            @if(settings()->has_discount)
            <div class="discounts-btn mt-2 mb-2 text-end pb-2">
                <span class="btn btn-secondary">
                    Remise
                </span>
            </div>
            @endif
            <!-- Subtotal -->
            @if($this->taxes)
            <td class="k_td_label">
                <span>
                    {{ __('Total HT') }} :
                </span>
            </td>

            <td class="k_list_monetary font-weight-bold">
                <span>
                    {{ format_currency($this->totalHT) }}
                </span>
            </td>
            @endif
            <br>
            <!-- Taxes -->
            @if($this->taxes)
            <td class="k_td_label ml-1">
                <label for="" class="k_text_label k_tax_total_label">
                    {{ __('Taxe') }} {{ sales_tax()->amount }}% :
                </label>
            </td>
            <td class="k_list_monetary">
                <span>
                    {{ format_currency($this->taxes) }}
                </span>
            </td>
            @endif
            <br>

            <!-- Total amount -->
            <td class="k_td_label">
                <label for="" class="k_text_label k_tax_total_label">
                    {{ __('Total') }} :
                </label>
            </td>

            <td class="k_list_monetary">
                <span class="font-weight-bolder">
                    (=) <b>{{ format_currency($this->total) }}</b>
                </span>
            </td>

        </div>

    </div>
    <!-- Loading -->
    <div class="k-loading cursor-pointer pb-1" wire:loading>
        <p>En cours de chargement ...</p>
    </div>
</div>
