@section('styles')
    <style>
        .page-body{
            height: 100%;
        }
        .payment-container{
            height: 82vh;
            overflow: hidden;
        }
        /* Pay */
        .top-content{
            font-size: 38px;
            line-height: 42px;
            font-weight: 700;
            text-align: center;
            height: 75px;
            padding: 16px 0 16px 0;
            border-bottom: 1px solid #D8DADD;
            min-height: auto;
            min-width: auto;
        }
        .payment-confirmed .actions{
            font-size: 14px;
            line-height: 21px;

        }
        .actions h1{
            font-size: 28px;
            line-height: 32px;
            font-weight: 500;
            height: 40.4px;
            margin: 0 0 8px 0;
            min-width: auto;
            min-height: auto
        }

        /* Print Button */
        .btn-print{
            font-size: 18.5px;
            line-height: 20px;
            font-weight: 600;
            text-align: center;
            vertical-align: middle;
            background-color: #D8DADD;
            height: 60px;
            padding: 16px 12px 16px 12px;
        }
        /* Pos Receipt */
        .pos-receipt-container{
            background-color: #E7E9ED;
            height: 100%;
            overflow: hidden;
        }
        .pos-receipt .pos-receipt-logo{
            height: 35px;
            padding: 3px 0 3px 0;
        }
        .pos-receipt .company-info{
            font-size: 11px;
            line-height: 14px;
        }
        .pos-receipt .company-info .receipt-number{
            font-weight: 500;
            padding: 5px 0 5px 0;
        }
        /* Print View */
        @media print{
            @page{
                margin: 0.2cm;

            }
            .page-wrapper{
                margin: 0;
                padding: 0;
                height: auto;
            }
            .page-body{
                height: auto;
                margin: 0;
                padding: 0;
            }
            .payment-container{
                height: auto;
            }
            .payment-cofirmed{
                padding: 0 !important;
                margin: 0 !important;
                height: auto !important;
            }

            .pos-receipt-container{
                background-color: #ffffff;
                height: auto;
                width: 100%;
            }
            .receipt-block{
                padding: 0 !important;
                margin: 0 !important;
                /* border: none !important; */
                height: auto;
            }
            .pos-receipt{
                overflow-y: hidden !important;
                height: auto;
                width: 100%;
                padding: -10px !important;
                margin: 0;
            }
            .pos-receipt .order-container-bg-view{
                overflow-y: hidden !important;
            }
        }
    </style>
@endsection
<div class="payment-container">
    <div class="card payment-cofirmed" style="height: 100%;">
        <div class="row" style="height: 85%;">
            <div class="top-content d-print-none">
                <h1>
                    {{ format_currency($order->total_amount / 100) }}
                </h1>
            </div>
            <!-- Actions -->
            <div class="col-md-8 h-100 d-print-none">
                <div class="actions justify-content-between flex-lg-grow-1">
                    <div class="d-flex flex-column m-4">
                        <h1>
                            Paiement réussi !
                        </h1>
                        <button class="btn-print w-100" onclick="window.print();">
                            <i class="bi bi-printer fw-bold mr-1"></i> Imprimer le reçu
                        </button>
                    </div>
                    <div class="validation_buttons d-print-none fixed-bar fixed-bottom d-flex w-100 gap-1">
                        <a href="{{ route('pos.ui', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'session' =>$pos->sessions()->isOpened()->first()->unique_token]) }}" class="btn-switch_pane btn-primary text-white rounded-0 fw-bolder review-button w-50 text-center text-decoration-none">
                            <span class="fs-1 d-block">
                                Nouvelle commande
                            </span>
                        </a>
                        <button class="btn-switch_pane btn-primary text-white rounded-0 fw-bolder review-button w-50">
                            <span class="fs-1 d-block mb-1">
                                Commandes
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Receipt -->
            <div class="pos-receipt-container col-md-4 d-flex flex-grow-1 flex-lg-grow-0 user-select-none justify-content-center bg-200 text-center overflow-hidden" style="height: 100%;">
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
                                Servi par {{ $order->cashier->user->name }}
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
        </div>
    </div>
</div>
@section('scripts')
<script>
    function printPDF() {
        // Specify the path to your PDF file
        var pdfPath = 'pdf/sales/s001.pdf';

        // Open a new window or tab with the PDF file
        var pdfWindow = window.open(pdfPath, '_blank');

        // Once the PDF is loaded, trigger the print function
        pdfWindow.onload = function () {
            pdfWindow.print();
        };
    }
</script>
@endsection
