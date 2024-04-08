

<div>
    <div class="d-print-none card border-0 shadow-sm" id="checkout-box">
        <div class="card-body" id="cart-body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            <span>{{ session('message') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Order -->
                @if($this->order)
                <div class="order-container-bg-view d-print-none overflow-y-auto flex-grow-1 d-flex flex-column text-start">
                    @foreach($this->order->details as $key => $cart_item)
                    <ul>
                        <li class="orderline p-2 lh-sm cursor-pointer {{ $cart_item->id == $this->selected ? 'selected' : '' }}" wire:click.prevent="selectedItem('{{ $cart_item->rowId }}', '{{ $cart_item->id }}')">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 fw-bolder pe-1 text-truncate">
                                    <span class="text-wrap">
                                        {{ $cart_item->product->product_name }}
                                    </span>
                                </div>
                                <div class="product-price w-25 d-inline-block text-end price fw-bolder">
                                    {{ format_currency($cart_item->sub_total / 100) }}
                                </div>
                            </div>
                            <ul>
                                <li class="price-per-unit">
                                    <em class="qty fst-normal fw-bolder me-1">{{ $cart_item->quantity }} </em> {{ __('Unité(s)') }} x {{ format_currency($cart_item->unit_price / 100) }}
                                </li>
                                @if($this->qty_refund)
                                <li class="price-per-unit" style="color: #017E84; font-weight: 500;">
                                    A Retourner: 1.00
                                </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    @endforeach
                </div>
                @else
                <div class="empty-cart d-flex flex-column align-items-center justify-content-center text-muted" style="height: 45vh;">
                    <i class="bi bi-cart-fill rotate-45" style="font-size: 60px; color: #898989;"></i>
                    <br>
                    <h3>
                        {{ __('Selectionnez une commande') }}
                    </h3>
                </div>
                @endif
                @if($this->order)
                <div class="order-summary w-100 py-2 px-3 bg-100 text-end fw-bolder fs-2 lh-sm">
                    Total: <span class="total">{{ format_currency($order->total_amount / 100) }}</span>
                    {{-- <div class="text-muted subentry">
                        Taxes: <span class="tax">(+) {{ Cart::instance($cart_instance)->tax() }}</span>
                    </div> --}}
                    {{-- @if($shipping)
                    <div class="text-muted subentry">
                        Livraisons: <span class="tax">(+) {{ Cart::instance($cart_instance)->tax() }}</span>
                    </div>
                    @endif --}}
                </div>
                @endif
                <div class="control_buttons d-flex bg-300 border-bottom flex-wrap">
                    <button class="k_price_list_button btn btn-light rounded-0 fw-bolder" style="width: 49.5%;">
                        <i class="bi bi-file-pdf"></i> Facture
                    </button>
                    <button class="btn btn-light rounded-0 fw-bolder" onclick="window.print();" style="width: 49.5%;">
                        <i class="bi bi-printer"></i> Reçu
                    </button>
                </div>
                <!-- Calculator -->
                <div class="calculator_buttons d-flex bg-300 border-bottom flex-wrap">
                    <div class=" w-25 flex-wrap d-flex" id="vertical_buttons">
                        <button onclick="Livewire.dispatch('openModal', {component: 'pos::modal.pick-customer-modal'})" class="btn btn-light rounded-0 fw-bolder h-25">
                            <i class="bi bi-people"></i> {{ $this->customer ? Str::limit($this->customer->name, 5, '...') : 'Client' }}
                        </button>
                        <button class="btn btn-light rounded-0 fw-bolder h-75" id="pay">
                            Rembourser
                        </button>
                    </div>
                    <div class="w-75 flex-wrap d-flex">
                        <button wire:click="updateQty(1)" class="k_price_list_button btn btn-light rounded-0 fw-bolder">
                            1
                        </button>
                        <button wire:click="updateQty(2)" class="btn btn-light rounded-0 fw-bolder">
                            2
                        </button>
                        <button wire:click="updateQty(3)" class="btn btn-light rounded-0 fw-bolder">
                            3
                        </button>
                        <button class="btn btn-light rounded-0 fw-bolder selected">
                            Qté
                        </button>
                        <!-- 2 -->
                        <button wire:click="updateQty(4)" class="k_price_list_button btn btn-light rounded-0 fw-bolder">
                            4
                        </button>
                        <button wire:click="updateQty(5)" class="btn btn-light rounded-0 fw-bolder">
                            5
                        </button>
                        <button wire:click="updateQty(6)" class="btn btn-light rounded-0 fw-bolder">
                            6
                        </button>
                        <button class="btn btn-light rounded-0 fw-bolder" disabled>
                            <i class="bi bi-percent"></i> Réduc
                        </button>
                        <!-- 3 -->
                        <button wire:click="updateQty(7)" class="k_price_list_button btn btn-light rounded-0 fw-bolder">
                            7
                        </button>
                        <button wire:click="updateQty(8)" class="btn btn-light rounded-0 fw-bolder">
                            8
                        </button>
                        <button wire:click="updateQty(9)" class="btn btn-light rounded-0 fw-bolder">
                            9
                        </button>
                        <button class="btn btn-light rounded-0 fw-bolder" disabled>
                            Prix
                        </button>
                        <!-- 4 -->
                        <button class="k_price_list_button btn btn-light rounded-0 fw-bolder">
                            ÷
                        </button>
                        <button class="btn btn-light rounded-0 fw-bolder" wire:click="updateQty(0)">
                            0
                        </button>
                        <button class="btn btn-light rounded-0 fw-bolder">
                            ,
                        </button>
                        <button wire:click="backspace" class="btn btn-light rounded-0 fw-bolder">
                            <i class="bi bi-backspace"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Receipt -->
    @if($this->order)
    <div class="d-none pos-receipt-container d-print-block col-md-4 d-flex flex-grow-1 flex-lg-grow-0 user-select-none justify-content-center bg-200 text-center overflow-hidden" style="height: 100%;">
        <div class="receipt-block d-inline-block w-100 bg-white m-3 p-3 border rounded bg-view text-start overflow-y-auto">
            <div class="pos-receipt p-2">
                <!-- Logo -->
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/default/logo.png') }}" alt="" class="pos-receipt-logo">
                </div>

                <!-- Company Info -->
                <div class="d-flex flex-column align-items-center company-info">
                    <div>
                        Adresse: {{ current_company()->address }}
                    </div>
                    <div>
                        Tel: {{ current_company()->phone }}
                    </div>
                    <div>
                        {{ current_company()->email }}
                    </div>
                    <div>
                        {{ current_company()->website }}
                    </div>
                    <div>
                        -------------------------
                    </div>
                    <div>
                        Servi par {{ $order->cashier->name }}
                    </div>
                    <div class="receipt-number">
                        <span class="fs-1">
                            {{ receipt_number($order->reference) }}
                        </span>
                    </div>
                </div>

                <!-- Order table -->
                <div class="order-container-bg-view overflow-y-auto flex-grow-1 d-flex flex-column text-start">
                    <ul>
                        @foreach ($order->details as $detail)
                        <!-- Product -->
                        <li class="orderline p-2 lh-sm cursor-pointer">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 fw-bolder pe-1 text-truncate">
                                    <span class="text-wrap">
                                        {{ $detail->product->product_name }}
                                    </span>
                                </div>
                                <div class="product-price w-50 d-inline-block text-end price fw-bolder">
                                    {{ format_currency(($detail->sub_total * $detail->quantity) / 100) }}
                                </div>
                            </div>
                            <ul>
                                <li class="price-per-unit" style="padding-left: 3px;">
                                    <em class="qty fst-normal fw-bolder me-1">{{ $detail->quantity }} </em> {{ __('Unité(s)') }} x {{ format_currency($detail->unit_price / 100) }}
                                </li>
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Separator -->
                <div class="align-items-center">
                    ---------------------------
                </div>
                <!-- Taxes table -->
                <div class="order-container-bg-view overflow-y-auto flex-grow-1 d-flex flex-column text-start">
                    <ul>
                        <!-- Total HT -->
                        <li class="orderline p-2 lh-sm cursor-pointer">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 pe-1 text-truncate">
                                    <span class="text-wrap">
                                        Total HT
                                    </span>
                                </div>
                                <div class="product-price w-50 d-inline-block text-end price fw-bold">
                                    {{ format_currency($order->total_amount / 100) }}
                                </div>
                            </div>
                        </li>
                        <!-- TVA -->
                        <li class="orderline p-2 lh-sm cursor-pointer">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 pe-1 text-truncate">
                                    <span class="text-wrap">
                                        TVA(18,9%)
                                    </span>
                                </div>
                                <div class="product-price w-50 d-inline-block text-end price fw-bold">
                                    283,5 FCFA
                                </div>
                            </div>
                        </li>
                        <!-- Total TTC -->
                        <li class="orderline p-2 lh-sm cursor-pointer">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 pe-1 text-truncate">
                                    <span class="text-wrap">
                                        Total TTC
                                    </span>
                                </div>
                                <div class="product-price w-50 d-inline-block text-end price fw-bold">
                                    {{ format_currency($order->total_amount / 100) }}
                                </div>
                            </div>
                        </li>
                        <!-- Moyen de paiement -->
                        <li class="orderline p-2 lh-sm cursor-pointer">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 pe-1 text-truncate">
                                    <span class="text-wrap">
                                        Règlement
                                    </span>
                                </div>
                                <div class="product-price w-50 d-inline-block text-end price fw-bold">
                                    {{ format_currency($order->paid_amount / 100) }}
                                </div>
                            </div>
                            <ul>
                                <li class="price-per-unit" style="padding-left: 3px;">
                                    <em class="qty fst-normal me-1">Espèces: {{ format_currency($order->paid_amount / 100) }}
                                </li>
                            </ul>
                        </li>
                        <!-- Reste -->
                        <li class="orderline p-2 lh-sm cursor-pointer">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 pe-1 text-truncate">
                                    <span class="text-wrap uppercase">
                                        Reste à payer
                                    </span>
                                </div>
                                <div class="product-price w-50 d-inline-block text-end price fw-bolder">
                                    {{ format_currency($order->due_amount / 100) }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Order data -->
                <div class="pos-receipt-order-data d-flex fs-5 flex-column align-items-center">
                    <!-- Koverae Mark -->
                    <p>
                        <b>Koverae</b> Point de Ventes
                    </p>
                    <div>
                        {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y H:i:s') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
