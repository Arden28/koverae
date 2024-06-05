<div>
    <!-- Table -->
    <div class="table-responsive card">
        <table class="table card-table text-nowrap">
            <thead class="order-table">
                <tr class="order-tr">
                    <th><button class="table-sort">{{ __('translator::sales.form.invoice.cart.product') }}</button></th>
                    <th><button class="table-sort">{{ __('translator::sales.form.invoice.cart.label') }}</button></th>
                    <th><button class="table-sort">{{ __('translator::sales.form.invoice.cart.quantity') }}</button></th>
                    <th><button class="table-sort">{{ __('translator::sales.form.invoice.cart.price') }}</button></th>
                    <th><button class="table-sort">{{ __('translator::sales.form.invoice.cart.wt') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inputs as $index => $value)
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <select wire:model.lazy="inputs.{{ $index }}.product" wire:change="updateProduct({{ $index }}, $event.target.value)"  id="" class="k_input" {{ $this->blocked ? 'disabled' : '' }}>
                            <option value=""></option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        @error("inputs.{{ $index }}.product") <span class="text-danger">{{ $message }}</span> @enderror
                    </td>
                    <td class="k_field_list">
                        <span>{!! $this->inputs[$index]['label'] !!}</span>
                    </td>
                    <td class="k_field_list">
                        <input type="number" class="k_input" wire:model.lazy="inputs.{{ $index }}.quantity" wire:change='updateSubtotal({{ $index }})' wire:key {{ $this->blocked ? 'disabled' : '' }}>
                    </td>
                    <td class="k_field_list">
                        <span>{{ $this->inputs[$index]['price'] }}</span>
                    </td>
                    <td class="k_field_list">
                        <span wire:model.lazy="inputs.{{ $index }}.subtotal" wire:change='updateSubtotal({{ $index }})'>{{ $this->inputs[$index]['subtotal'] }}</span>
                    </td>
                    <td class="k_field_list cursor-pointer {{ $this->blocked ? 'd-none' : '' }}">
                        <span wire:click.prevent="remove({{$index}})">
                            <i class="bi bi-trash"></i>
                        </span>
                    </td>
                </tr>
                @endforeach

                <tr class="k_field_list_row {{ $this->blocked ? 'd-none' : '' }}">
                    <td class="k_field_list">
                        <span wire:click.prevent="add({{$i}})" class="cursor-pointer " href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter une ligne
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Note and total part -->
    <div class="mt-2 k_group row align-items-start">

        <div class="k_inner_group col-lg-9">
            <div class="flex-grow-0 k_cell flex-sm-grow-0">
                <div class="note-editable" id="note_1">
                    <textarea wire:model="term" id="term" {{ $this->blocked ? 'disabled' : '' }} style="width: 75%; padding-left: 5px; padding-top:10px;" id="" cols="30" rows="7" class="k_input textearea" placeholder="{{ __('translator::components.carts.summary.conditions') }}">
                        {!! $term !!}
                    </textarea>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="overflow-y-auto k_inner_group k_subtotal_footer col-lg-3 right h-100">
            <!-- Discount -->
            @if(settings()->has_discount)
            <div class="pb-2 mt-2 mb-2 discounts-btn text-end">
                <span class="btn btn-secondary">
                    {{ __('translator::components.carts.summary.discount') }}
                </span>
            </div>
            @endif
            <!-- Subtotal -->
            @if($this->taxes)
            <td class="k_td_label">
                <span>
                    {{ __('translator::components.carts.summary.total_wt') }} :
                </span>
            </td>

            <td class="k_list_monetary font-weight-bold">
                <span class="k_total_taxes">
                    {{ format_currency($this->totalHT) }}
                </span>
            </td>
            @endif
            <br>
            <!-- Taxes -->
            @if($this->taxes)
            <td class="ml-1 k_td_label">
                <label for="" class="k_text_label k_tax_total_label">
                    {{ __('translator::components.carts.summary.taxes') }} :
                </label>
            </td>
            <td class="k_list_monetary">
                <span class="k_total_taxes">
                    {{ format_currency($this->taxes) }}
                </span>
            </td>
            @endif
            <br>

            <!-- Total amount -->
            <td class="k_td_label">
                <label for="" class="k_text_label k_tax_total_label">
                    {{ __('translator::components.carts.summary.total') }} :
                </label>
            </td>

            <td class="k_list_monetary">
                <span class="font-weight-bolder total-price {{ $this->taxes ? 'with-border' : '' }}">
                    {{ format_currency($this->total) }}
                </span>
            </td>

        </div>

    </div>
    <!-- Loading -->
    <div class="pb-1 cursor-pointer k-loading" wire:loading>
        <p>{{ __('translator::components.loading.text') }}</p>
    </div>
</div>
