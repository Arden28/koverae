<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html"/>
        <title>{{ __('Devis') }} - {{ $quotation->reference }} | {{ current_company()->name }}</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

        <link rel="stylesheet" href="{{ public_path('b3/bootstrap.min.css') }}">

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1.15;
                margin: 0;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 12px;
                margin: 36pt;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            strong {
                font-weight: bolder;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            table {
                border-collapse: collapse;
            }

            th {
                text-align: inherit;
            }

            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 16px;
            }

            h4, .h4 {
                font-size: 1.5rem;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
            }

            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .mt-5 {
                margin-top: 3rem !important;
            }

            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }

            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }
            .header{
                height: auto;
                border-bottom: 1px solid #000000;
            }
            .logo {
                text-align: start;
            }
            .logo img {
                height: 40px;
                width: auto;
                display: inline-flex;
                margin: 0 auto;
            }

        </style>
    </head>

    <body>
        <div class="header">
            <div class="logo">
                <img src="{{ base_path('public/assets/images/logo/logo-black-gd.png') }}" alt="logo" />
            </div>
        </div>

        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong>{{ current_company()->name }}</strong>
                        </h4>

                        @if(current_company()->address)
                            <p class="company-address">
                                {{ __('Adresse') }}: {{ current_company()->address }}
                            </p>
                        @endif

                        @if(current_company()->phone)
                            <p class="company-phone">
                                {{ __('Téléphone') }}: {{ current_company()->phone }}
                            </p>
                        @endif

                        @if(current_company()->email)
                            <p class="company-email">
                                {{ __('Adresse e-mail') }}: {{ current_company()->email }}
                            </p>
                        @endif

                        @if(current_company()->code)
                            <p class="company-code">
                                {{ __('Code') }}: {{ current_company()->code }}
                            </p>
                        @endif

                        @if(current_company()->vat)
                            <p class="company-vat">
                                {{ __('TVA') }}: {{ current_company()->vat }}
                            </p>
                        @endif

                    </td>
                    <td class="border-0 pl-0" width="50%">
                        <h4 class="text-uppercase cool-gray">
                            <strong>{{ __('Devis') }} # {{ $quotation->reference }}</strong>
                        </h4>
                        <p>{{ __('Date du devis') }}: <strong>{{ \Carbon\Carbon::parse($quotation->date)->format('d/m/Y') }}</strong></p>
                        <p>{{ __("Date d'échéance") }}: <strong>{{ \Carbon\Carbon::parse($quotation->expected_date)->format('d/m/Y') }}</strong></p>
                        <p>{{ __("Vendeur") }}: {{ $seller->user->name }}</p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 border-top-1 pl-0 party-header">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-0"></td>
                    <td class="d-flex" width="40%">
                        @if($customer->name)
                            <p class="customer-name">
                                <strong>{{ $customer->name }}</strong>
                            </p>
                        @endif

                        @if($customer->phone)
                            <p class="customer-phone">
                                {{ __('Téléphone') }}: {{ $customer->phone }}
                            </p>
                        @endif

                        @if($customer->email)
                            <p class="customer-email">
                                {{ __('Adresse e-mail') }}: {{ $customer->email }}
                            </p>
                        @endif

                        @if($customer->address)
                            <p class="customer-address">
                                {{ __('Adresse') }}: {{ $customer->address }}
                            </p>
                        @endif
                    </td>
                </tr>
                    </tbody>
                </table>

                {{-- Table --}}
                <table class="table table-items">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 pl-0">{{ __('Description') }}</th>
                            <th scope="col" class="text-center border-0">{{ __('Quantité') }}</th>
                            <th scope="col" class="text-right border-0">{{ __('Prix Unitaire') }}</th>
                            @if($quotation->product_discount_percentage)
                                <th scope="col" class="text-right border-0">{{ __('Réduction') }}</th>
                            @endif
                            @if($quotation->tax_percentage)
                                <th scope="col" class="text-right border-0">{{ __('Taxe') }}</th>
                            @endif
                            <th scope="col" class="text-right border-0 pr-0">{{ __('Sub total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Items --}}
                        @foreach($quotation->quotationDetails as $item)
                        <tr>
                            <td class="pl-0">
                                {{ $item->product_name }} <br>
                                <span class="badge badge-success" style="font-size: 10px;">
                                    {{ $item->product_code }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{ $item->quantity }} Unité(s)
                            </td>
                            <td class="text-right">
                                {{ format_currency($item->unit_price) }}
                            </td>
                            @if($quotation->product_discount_amount)
                                <td class="text-right">
                                    {{ format_currency($item->product_discount_amount) }}
                                </td>
                            @endif
                            <td class="text-right">
                                {{ format_currency($item->product_tax_amount ?? 0) }}
                            </td>

                            <td class="text-right pr-0">
                                {{ format_currency($item->sub_total) }}
                            </td>
                        </tr>
                        @endforeach
                        {{-- Summary --}}
                        @if($quotation->discount_amount)
                            <tr>
                                <td colspan="{{ $quotation->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('Réduction') }} ({{ $quotation->discount_percentage }})%</td>
                                <td class="text-right pr-0">
                                    {{ format_currency($quotation->discount_amount) }}
                                </td>
                            </tr>
                        @endif
                        @if($quotation->tax_amount)
                            <tr>
                                <td colspan="{{ $quotation->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('Taxe') }}  ({{ $quotation->tax_percentage }}%)</td>
                                <td class="text-right pr-0">
                                    {{ format_currency($quotation->tax_amount) }}
                                </td>
                            </tr>
                        @endif
                        @if($quotation->tax_rate)
                            <tr>
                                <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('invoices::invoice.tax_rate') }}</td>
                                <td class="text-right pr-0">
                                    {{ $quotation->tax_percentage }}%
                                </td>
                            </tr>
                        @endif
                        @if($quotation->shipping_amount)
                            <tr>
                                <td colspan="{{ $quotation->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('Livraison') }}</td>
                                <td class="text-right pr-0">
                                    {{ format_currency($quotation->shipping_amount) }}
                                </td>
                            </tr>
                        @endif
                            <tr>
                                <td colspan="{{ $quotation->table_columns - 2 }}" class="border-0"></td>
                                <td class="text-right pl-0">{{ __('Grand Total') }}</td>
                                <td class="text-right pr-0 total-amount">
                                    {{ format_currency($quotation->total_amount) }}
                                </td>
                            </tr>
                    </tbody>
                </table>

                @if($quotation->term)
                    <p>
                        {{ __('Notes') }}: {!! $quotation->term !!}
                    </p>
                @endif

                <p>
                    Délai de paiement: {{ payment_term($quotation->payment_term) }}
                </p>
                @if($quotation->shipping_date)
                <p>
                    Date de livraison prévue: {{ \Carbon\Carbon::parse($quotation->shipping_date)->format('d/m/Y') }}
                </p>
                @endif

                {{-- <div class="row" style="margin-top: 25px;">
                    <div class="col-xs-12">
                        <h4 style="text-align: center">
                            {{ Auth::user()->currentCompany->name }}
                            &copy; {{ date('Y') }}.
                        </h4>
                    </div>
                </div> --}}

                <script type="text/php">
                    if (isset($pdf) && $PAGE_COUNT > 1) {
                        $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                        $size = 10;
                        $font = $fontMetrics->getFont("Verdana");
                        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                        $x = ($pdf->get_width() - $width);
                        $y = $pdf->get_height() - 35;
                        $pdf->page_text($x, $y, $text, $font, $size);
                    }
                </script>
            </body>
        </html>
