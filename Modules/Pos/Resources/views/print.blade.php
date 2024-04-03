<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title') - Koverae</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ public_path('assets/images/logo/favicon.ico')}}" />
    <!-- CSS files -->
    <link href="{{ public_path('assets/dist/css/tabler.min.css')}}?1668287864" rel="stylesheet"/>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>

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
        /* Pos Receipt */
        .pos-receipt-container{
            /* background-color: #E7E9ED; */
            height: 100%;
        }
        .pos-receipt .pos-receipt-logo{
            text-align: center;
            vertical-align: middle;
            height: 35px;
            margin: 0 79px 0 79px;
        }
        .pos-receipt .company-info{
            font-size: 11px;
            line-height: 14px;
        }
        .pos-receipt .company-info .receipt-number{
            font-weight: 500;
            padding: 5px 0 5px 0;
        }
    </style>
</head>
<body>
    <!-- Receipt -->
    <div class="pos-receipt-container col-md-4 d-flex flex-grow-1 flex-lg-grow-0 user-select-none justify-content-center bg-200 text-center overflow-hidden" style="height: 100%;">
        <div class="d-inline-block w-100 bg-white m-3 p-3 border rounded bg-view text-start overflow-y-auto">
            <div class="pos-receipt p-2">
                <!-- Logo -->
                <img src="{{ public_path('assets/images/default/logo.png') }}" alt="" class="pos-receipt-logo">

                <!-- Company Info -->
                <div class="d-flex flex-column align-items-center company-info">
                    <div>
                        Adresse: Place de Coupole 372 Brazzaville
                    </div>
                    <div>
                        Tel: +242 06-407-49-26
                    </div>
                    <div>
                        customer@koverae.com
                    </div>
                    <div>
                        https://www.koverae.com
                    </div>
                    <div>
                        -------------------------
                    </div>
                    <div>
                        Servi par Arden BOUET
                    </div>
                    <div class="receipt-number">
                        <span class="fs-1">
                            27
                        </span>
                    </div>
                </div>

                <!-- Order table -->
                <div class="order-container-bg-view overflow-y-auto flex-grow-1 d-flex flex-column text-start">
                    <ul>
                        <!-- Product -->
                        <li class="orderline p-2 lh-sm cursor-pointer">
                            <div class="d-flex">
                                <div class="product-name w-75 d-inline-block flex-grow-1 fw-bolder pe-1 text-truncate">
                                    <span class="text-wrap">
                                        Banéo Sucrée
                                    </span>
                                </div>
                                <div class="product-price w-25 d-inline-block text-end price fw-bolder">
                                    1500 FCFA
                                </div>
                            </div>
                            <ul>
                                <li class="price-per-unit" style="padding-left: 3px;">
                                    <em class="qty fst-normal fw-bolder me-1">3 </em> {{ __('Unité(s)') }} x 500 FCFA
                                </li>
                            </ul>
                        </li>
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
                                <div class="product-price w-25 d-inline-block text-end price fw-bold">
                                    1216,5 FCFA
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
                                <div class="product-price w-25 d-inline-block text-end price fw-bold">
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
                                <div class="product-price w-25 d-inline-block text-end price fw-bold">
                                    1500 FCFA
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
                                <div class="product-price w-25 d-inline-block text-end price fw-bold">
                                    1500 FCFA
                                </div>
                            </div>
                            <ul>
                                <li class="price-per-unit" style="padding-left: 3px;">
                                    <em class="qty fst-normal me-1">Espèces: 1500 FCFA
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
                                <div class="product-price w-25 d-inline-block text-end price fw-bolder">
                                    0 FCFA
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Order data -->
                <div class="pos-receipt-order-data d-flex fs-6 flex-column align-items-center">
                    <!-- Koverae Mark -->
                    <p>
                        Fait avec Koverae
                    </p>
                    <div>
                        {{ \Carbon\Carbon::now() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
