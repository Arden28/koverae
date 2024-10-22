@section('styles')
    <style>
        .fixed-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            /* padding: 10px; */
            margin-top: 30px;
            z-index: 100;
            display: flex;
            /* text-align: center; */
        }

        .fixed-bar-pay {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            /* padding: 10px; */
            margin-top: 30px;
            z-index: 100;
            display: flex;
            /* text-align: center; */
        }
        .fixed-bar .btn-switch_pane{
            text-align: center;
            vertical-align: middle;
            background-color: #f1f3f4;
            height: 58px;
            width: 50%;
            padding: 5px 10px 5px 10px;
            min-width: auto;
            min-width: auto;
        }
        .fixed-bar .btn-switch_pane:hover{
            background-color: #ffffff;
        }
        .fixed-bar #pay-order{
            background-color: #026d72;
        }
        .fixed-bar #pay-order:hover{
            background-color: #035d62;
        }
        /* Shop Display */
        @media (min-width: 990px) {
            .fixed-bar{
                display: none;
            }
        }

        /* Checkout box */
        @media (max-width: 990px) {
            /* #checkout-box{
                display: none;
            } */
        }
        #checkout-box{
            /* top: 0;
            left: 0;  */
        }
        .empty-cart{
            text-align: center;
            height: 150px;
            padding: 16px 24px 16px 24px;
        }
        .empty-cart i{
            font-size: 56px;
            line-height: 56px;
            color: #737373;
            height: 56px;
            width: 52px;
        }
        .empty-cart h3{
            font-size: 15px;
            font-weight: 500;
            margin: 8px 0 8px 0;
        }
        #cart-body{
            padding: 0 0 0 0px;
            position: absolute;
        }

        /* Right side cart */
        .empty-cart{
            background-color: #e7e7e7;
            height: 200px;
            min-height: auto;
            min-width: auto;
        }
        .order-container-bg-view{
            height: 170px;
            min-height: auto;
            min-width: auto;
            background-color: #ffffff;
        }
        .order-container-bg-view .oderline{
            text-align: left;
            height: 51px;
            padding: 8px 8px 8px 8px;
            min-height: auto;
            min-width: auto;
            display: list-item;
        }
        /* For WebKit browsers like Chrome and Safari */
        .order-container-bg-view::-webkit-scrollbar {
            width: 3px; /* Set the width of the scrollbar */
        }

        /* Handle on hover */
        .order-container-bg-view::-webkit-scrollbar-thumb:hover {
            background: #03565b; /* Change the color on hover */
        }
        .orderline.selected{
            background-color: #E6F2F3
        }
        .oderline .product-name{
            text-align: left;
            white-space: nowrap;
            padding: 0 4px 0 0;
            height: 16px;
            min-height: auto;
            min-width: auto;
        }
        .oderline .product-price{
            text-align: right;
            height: 16px;
            width: 44px;
            display: block;
            min-height: auto;
            min-width: auto;
        }
        .price-per-unit{
            height: 17px;
            width: 80%;
            margin-left: 10px;
            display: list-item;
        }
        .order-summary{
            background-color: #F9FAFB;
            height: auto;
            max-height: auto;
            padding: 8px 16px 8px 16px;
            min-height: auto;
            min-width: auto;
        }
        .order-summary .subentry{
            font-size: 14px;
        }
        /* Control Buttons */
        .control_buttons{
            font-size: 14px;
            line-height: 21px;
            white-space: nowrap;
            word-spacing: 0px;
            background-color: #D8DADD;
            /* height: 120px; */
            height: auto;
            border-top: 1px solid #D8DADD;
            border-bottom: 1px solid #D8DADD;
        }
        .control_buttons .btn{
            font-size: 14px;
            font-weight: 700;
            line-height: 21px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            /* height: 38px; */
            /* width: 168px; */
            width: 32.7%;
            border: #E7E9ED;
            padding: 8px 8px 8px 8px;
            margin: 0 1px 0 1px;
            min-height: auto;
            min-width: auto;
        }
        .control_buttons #reset-cart{
            width: 100%;
        }
        /* Calculator Buttons */
        .calculator_buttons{
            font-size: 14px;
            line-height: 21px;
            /* white-space: nowrap; */
            word-spacing: 0px;
            background-color: #D8DADD;
            height: auto;
            border-top: 1px solid #D8DADD;
            border-bottom: 1px solid #D8DADD;
            min-height: auto;
            min-width: auto;
        }
        /* Vertical */
        #vertical_buttons .btn{
            width: 100%;
        }

        .calculator_buttons .btn{
            font-size: 14px;
            font-weight: 700;
            line-height: 21px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            height: 40px;
            /* width: 93.5px; */
            width: 24.3%;
            border: #E7E9ED;
            padding: 8px 8px 8px 8px;
            margin: 0 1px 0 1px;
            min-height: auto;
            min-width: auto;
        }
        .calculator_buttons .btn.selected{
            background-color: #e0edef;
            border: 1px solid #017E84;
        }
        .calculator_buttons #pay{
            background-color: #03565b;
            color: white;
        }
        .calculator_buttons #pay:hover{
            background-color: #044145;
            color: white;
        }

        /* Filter Component */
        .category_section_buttons{
            height: 48px;
        }
        .section_buttons{
            overflow-x:  scroll; /* Use 'scroll' to always show scrollbar, or 'auto' to show it only when needed */
            scrollbar-width: thin; /* Firefox */
            scrollbar-color: transparent transparent; /* Firefox */
        }
        .section_buttons::-webkit-scrollbar {
            width: 0.5em; /* Adjust the width of the scrollbar as needed */
        }
        .section_buttons::-webkit-scrollbar-thumb {
            background-color: transparent; /* Set the color of the scrollbar thumb */
        }
        .category_section_buttons .category_button{
            font-weight: 500;
            height: 100%;
            width: auto;
            padding: 4px 4px 4px 4px;
            margin: 0 4px 0 4px;
            min-height: auto;
            min-width: auto;
            border-radius: 1px 1px 1px 1px;
        }
        .category_section_buttons .category_button:hover{
            background-color: #E7E9ED;
            cursor: pointer;
        }
        .category_section_buttons .category_button i{
            font-size: 20px;
            line-height: 02px;
            text-align: center;
        }
        /* Product List */
        #left-product-side-product{
            padding: 8px 16px 8px 16px;
        }
        @media (max-width: 768px) {
            #left-product-side-product{
                /*  */
            }
        }
        .product-list{
            width: 100%;
            padding: 4px 16px 4px 16px;
            margin: 0 0 4px 0;
            /* overflow-y: auto; */
        }
        .product-list .product{
            height: auto;
            width: 18.5%;
            border: 1px solid #F9FAFB;
            padding: 0;
            min-width: auto;
            min-height: auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Adjust the values as needed */
        }
        @media (max-width: 380px){
            .product-list .product{
                width: 48.5%;
            }
            .product-list .product .product-name, .price-tag{
                font-size: 11px;
            }
        }
        /* Styles for screens between 380px and 507px */
        @media (min-width: 380px) and (max-width: 507px) {
            .product-list .product{
                width: 31%;
            }
            .product-list .product .product-name, .price-tag{
                font-size: 12px;
            }
        }
        /* Styles for screens between 507px and 691px */
        @media (min-width: 507px) and (max-width: 691px) {
            .product-list .product{
                width: 31%;
            }
            .product-list .product .product-name, .price-tag{
                font-size: 13px;
            }
        }

        /* .product-list .product-content{
            width: 100%;
            margin: 0 8px 0 8px;
        } */
        .product-list .product .product-content .product-name{
            height: auto;
            width: 100%;
            min-height: auto;
            min-width: auto;
        }
        .product-list .product .product-content .price-tag{
            height: auto;
            width: 100%;
            padding: 4px 0 4px 0;
            min-height: auto;
            min-width: auto;
        }
        .product-list .product img{
            width: 100%;
        }
        /* K Modal */

        .k-modal {
            display: block; /* The modal is visible by default */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            opacity: 1; /* The modal is visible by default */
            transition: opacity 0.3s ease-in-out;
        }
    </style>
@endsection

<div>
    <div class="card border-0 shadow-sm" id="checkout-box">
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
                @if($cart_items->isNotEmpty())
                <div class="order-container-bg-view overflow-y-auto flex-grow-1 d-flex flex-column text-start">
                    @foreach($cart_items as $key => $cart_item)
                    <ul>
                        <li class="orderline p-2 lh-sm cursor-pointer {{ $cart_item->id == $this->selected ? 'selected' : '' }}" wire:click.prevent="selectedItem('{{ $cart_item->rowId }}', '{{ $cart_item->id }}')">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 fw-bolder pe-1 text-truncate">
                                    <span class="text-wrap">
                                        {{ $cart_item->name }}
                                    </span>
                                </div>
                                <div class="product-price w-25 d-inline-block text-end price fw-bolder">
                                    {{ format_currency($cart_item->subtotal) }}
                                </div>
                            </div>
                            <ul>
                                <li class="price-per-unit">
                                    <em class="qty fst-normal fw-bolder me-1">{{ $cart_item->qty }} </em> {{ __('Unité(s)') }} x {{ format_currency($cart_item->price) }}
                                </li>
                                {{-- <li class="price-per-unit text-muted">
                                    Avec une réduction de 15 %
                                </li> --}}
                            </ul>
                        </li>
                    </ul>
                    @endforeach
                </div>
                @else
                <div class="empty-cart d-flex flex-column align-items-center justify-content-center h-100 w-100 text-muted">
                    <i class="bi bi-cart-fill rotate-45" style="font-size: 60px; color: #898989;"></i>
                    <br>
                    <h3>
                        {{ __('Cette commande est vide') }}
                    </h3>
                </div>
                @endif
                @php
                    $total_with_shipping = (convertToInt(Cart::instance($cart_instance)->total()) / 10000) + $shipping;
                @endphp
                @if($cart_items->isNotEmpty())
                <div class="order-summary w-100 py-2 px-3 bg-100 text-end fw-bolder fs-2 lh-sm">
                    Total: <span class="total">{{ format_currency($total_with_shipping) }}</span>
                    <div class="text-muted subentry">
                        Taxes: <span class="tax">(+) {{ Cart::instance($cart_instance)->tax() }}</span>
                    </div>
                    @if($shipping)
                    <div class="text-muted subentry">
                        Livraisons: <span class="tax">(+) {{ Cart::instance($cart_instance)->tax() }}</span>
                    </div>
                    @endif
                </div>
                @endif
                <div class="control_buttons d-flex bg-300 border-bottom flex-wrap">
                    <button class="k_price_list_button btn btn-light rounded-0 fw-bolder" >
                        <i class="bi bi-tag-fill"></i> Liste de prix
                    </button>
                    <button class="btn btn-light rounded-0 fw-bolder">
                        <i class="bi bi-arrow-counterclockwise"></i> Remboursement
                    </button>
                    <button class="btn btn-light rounded-0 fw-bolder">
                        <i class="bi bi-upc"></i> Entrez le code
                    </button>
                    <button class="btn btn-light rounded-0 fw-bolder">
                        <i class="bi bi-stars"></i> Cadeaux
                    </button>
                    <button class="btn btn-light rounded-0 fw-bolder" {{ $this->customer ? '' : 'disabled' }}>
                        <i class="bi bi-stickies"></i> Note du client
                    </button>
                    <button class="btn btn-light rounded-0 fw-bolder">
                        <i class="bi bi-upload"></i> Enregistrer
                    </button>
                    <button class="btn btn-light rounded-0 fw-bolder" wire:click="resetCart" id="reset-cart">
                        <i class="bi bi-x"></i> Annuler la commande
                    </button>
                </div>
                <!-- Calculator -->
                <div class="calculator_buttons d-flex bg-300 border-bottom flex-wrap">
                    <div class=" w-25 flex-wrap d-flex" id="vertical_buttons">
                        <button onclick="Livewire.dispatch('openModal', {component: 'pos::modal.pick-customer-modal'})" class="btn btn-light rounded-0 fw-bolder h-25">
                            <i class="bi bi-people"></i> {{ $this->customer ? Str::limit($this->customer->name, 5, '...') : 'Client' }}
                        </button>
                        <button onclick="Livewire.dispatch('openModal', {component: 'pos::modal.checkout-modal', arguments: {pos: {{ $this->pos->id }},  total: {{ convertToInt(Cart::instance($this->cart_instance)->total()) / 10000 }}, customer: {{ $this->customer }} }} )" class="btn btn-light rounded-0 fw-bolder h-75 {{ $this->customer && Cart::instance($this->cart_instance)->total() > 1 ? '' : 'disabled' }}" id="pay">
                            Payer
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

    {{--Checkout Modal--}}

</div>

