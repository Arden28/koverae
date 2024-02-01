<div>
    <div class="table-responsive" style="margin-top: 10px;">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th><button class="table-sort" data-sort="sort-name">{{ __('Nom du Produit') }}</button></th>
                    <th><button class="table-sort" data-sort="sort-name">{{ __('Description') }}</button></th>
                    <th><button class="table-sort" data-sort="sort-name">{{ __('Quantité') }}</button></th>
                    <th><button class="table-sort" data-sort="sort-name">{{ __('Prix unitaire') }}</button></th>
                    <th><button class="table-sort" data-sort="sort-name">{{ __('Réduction') }}</button></th>
                    <th><button class="table-sort" data-sort="sort-name">{{ __('Taxe') }}</button></th>
                    <th><button class="table-sort" data-sort="sort-name">{{ __('Hors Taxe') }}</button></th>
                    <th><button class="table-sort" data-sort="sort-name">{{ __('Subtotal') }}</button></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($cart_items->isNotEmpty())
                    @foreach($cart_items as $cart_item)
                    <tr class="k_field_list_row">
                        <td class="k_field_list">
                            <input type="text"  class="k_input" value="{{ $cart_item->name }}" />
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ $cart_item->options->description }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            @include('livewire.cart.includes.product-cart-quantity')
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ format_currency($cart_item->options->unit_price) }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ format_currency($cart_item->options->product_discount) }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ $cart_item->options->product_tax }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ format_currency($cart_item->options->sub_total) }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" value="{{ format_currency($cart_item->options->sub_total) }}" class="k_input">
                        </td>
                        <td class="k_field_list cursor-pointer">
                            <span wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                                <i class="bi bi-trash"></i>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                @endif

                @foreach($inputs as $key => $value)
                    <tr class="k_field_list_row">
                        <td class="k_field_list">
                            <livewire:search.search-input-text  :special="$key" />
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="description.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="number" wire:model="qty.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="unit_price.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax_exclusion.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="tax_exclusion.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list">
                            <input type="text" wire:model="subtotal.{{ $value }}" class="k_input">
                        </td>
                        <td class="k_field_list cursor-pointer">
                            <span wire:click.prevent="remove({{$key}})">
                                <i class="bi bi-trash"></i>
                            </span>
                        </td>
                    </tr>
                @endforeach
                @if($status == 'posted')
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        &nbsp;
                    </td>
                </tr>
                @else
                <tr class="k_field_list_row">
                    <td class="k_field_list">
                        <span wire:click.prevent="add({{$i}})" class=" cursor-pointer" href="avoid:js">
                            <i class="bi bi-plus-circle"></i> Ajouter un produit
                        </span>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Note and total part -->
    <div class="k_group row align-items-start mt-2 mt-md-0">

        <div class="k_inner_group col-lg-8">
            <div class="k_cell flex-grow-0 flex-sm-grow-0">
                <div class="note-editable" id="note_1">
                    <textarea wire:model="term" id="term" style="width: 75%; padding-left: 5px; padding-top:10px;" id="" cols="30" rows="5" class="k_input textearea" placeholder="Termes & conditions">
                        {!! $term !!}
                    </textarea>
                </div>
            </div>
        </div>

        <div class="k_inner_group k_subtotal_footer col-lg-4 right">
            <div class="k_cell flex-grow-1 flex-sm-grow-0">

                @if($global_tax > 0)
                    <!-- Taxes -->
                    <td class="k_td_label">
                        <label for="" class="k_text_label k_tax_total_label">
                            {{ __('Taxe') }} ({{ $global_tax }}%) :
                        </label>
                    </td>

                    <td class="k_list_monetary">
                        <span>
                            (+) {{ format_currency(Cart::instance($cart_instance)->tax()) }}
                        </span>
                    </td>
                @endif

                <!-- Reduction
                <td class="k_td_label">
                    <label for="" class="k_text_label k_tax_total_label">
                        {{ __('Réduction') }} ({{ $global_discount }}%) :
                    </label>
                </td>

                <td class="k_list_monetary">
                    <span>
                        (-) {{ format_currency(0) }}
                    </span>
                </td>
                -->
                @if($shipping)
                    <!-- Livraison -->
                    <td class="k_td_label">
                        <label for="" class="k_text_label k_tax_total_label">
                            {{ __('Livraison') }} :
                        </label>
                    </td>

                    <td class="k_list_monetary">
                        <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                        <span>
                            (+) {{ $shipping }}
                        </span>
                    </td>
                @endif

                <td class="k_td_label">
                    <label for="" class="k_text_label k_tax_total_label">
                        <b>{{ __('Total') }}</b> :
                    </label>
                </td>

                @php
                    $total_with_shipping = Cart::instance($cart_instance)->subtotal()
                @endphp

                <td class="k_list_monetary">
                    <span>
                        (=) {{ $total_with_shipping }}
                    </span>
                </td>
            </div>
        </div>
    </div>
</div>
