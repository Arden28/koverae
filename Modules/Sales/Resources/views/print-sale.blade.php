<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html"/>
        <title>{{ __('Commande') }} - {{ $sale->reference }} | {{ current_company()->name }}</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

        <link rel="stylesheet" href="{{ public_path('b3/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ public_path('assets/css/invoice.css?v=1234566' ) }}">

    </head>

    <body>
        {{-- Header --}}
        {{-- @if($sale->logo)
            <img src="{{ $sale->getLogo() }}" alt="logo" height="100">
        @endif --}}
        <div class="header">
            <div class="logo">
                <img src="{{ base_path('public/assets/images/logo/logo-black-gd.png') }}" alt="logo" />
            </div>
        </div>

        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="pl-0 border-0" width="70%">
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
                    <td class="pl-0 border-0" width="50%">
                        <h4 class="text-uppercase cool-gray">
                            <strong> # {{ $sale->reference }}</strong>
                        </h4>
                        <p>{{ __('Date de la commande') }}: <strong>{{ \Carbon\Carbon::parse($sale->date)->format('d/m/Y') }}</strong></p>
                        <p>{{ __("Vendeur") }}: {{ $seller->user->name }}</p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table">
            <thead>
                <tr>
                    <th class="pl-0 border-0 border-top-1 party-header">
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
                            <th scope="col" class="pl-0 border-0">{{ __('Description') }}</th>
                            <th scope="col" class="text-center border-0">{{ __('Quantité') }}</th>
                            <th scope="col" class="text-right border-0">{{ __('Prix Unitaire') }}</th>
                            @if($sale->product_discount_percentage)
                                <th scope="col" class="text-right border-0">{{ __('Réduction') }}</th>
                            @endif
                            @if($sale->tax_percentage)
                                <th scope="col" class="text-right border-0">{{ __('Taxe') }}</th>
                            @endif
                            <th scope="col" class="pr-0 text-right border-0">{{ __('Sub total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Items --}}
                        @foreach($sale->saleDetails as $item)
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
                                {{ format_currency($item->unit_price / 100) }}
                            </td>
                            @if($sale->product_discount_amount)
                                <td class="text-right">
                                    {{ format_currency($item->product_discount_amount / 100) }}
                                </td>
                            @endif
                            <td class="text-right">
                                {{ format_currency($item->product_tax_amount / 100 ?? 0) }}
                            </td>

                            <td class="pr-0 text-right">
                                {{ format_currency($item->sub_total / 100) }}
                            </td>
                        </tr>
                        @endforeach
                        {{-- Summary --}}
                        @if($sale->discount_amount)
                            <tr class="text-right ">
                                <td colspan="{{ $sale->table_columns - 2 }}" class="border-0"></td>
                                <td class="pl-0 text-right">{{ __('Réduction') }} ({{ $sale->discount_percentage }})%</td>
                                <td class="pr-0 text-right">
                                    {{ format_currency($sale->discount_amount) }}
                                </td>
                            </tr>
                        @endif
                        @if($sale->tax_amount)
                            <tr class="text-right ">
                                <td colspan="{{ $sale->table_columns - 2 }}" class="border-0"></td>
                                <td class="pl-0 text-right">{{ __('Taxe') }}  ({{ $sale->tax_percentage }}%)</td>
                                <td class="pr-0 text-right">
                                    {{ format_currency($sale->tax_amount) }}
                                </td>
                            </tr>
                        @endif
                        @if($sale->tax_rate)
                            <tr class="text-right ">
                                <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                                <td class="pl-0 text-right">{{ __('invoices::invoice.tax_rate') }}</td>
                                <td class="pr-0 text-right">
                                    {{ $sale->tax_percentage }}%
                                </td>
                            </tr>
                        @endif
                        @if($sale->shipping_amount)
                            <tr class="text-right ">
                                <td colspan="{{ $sale->table_columns - 2 }}" class="border-0"></td>
                                <td class="pl-0 text-right">{{ __('Livraison') }}</td>
                                <td class="pr-0 text-right">
                                    {{ format_currency($sale->shipping_amount) }}
                                </td>
                            </tr>
                        @endif
                            <tr class="text-right ">
                                <td colspan="{{ $sale->table_columns - 2 }}" class="border-0"></td>
                                <td class="pl-0 text-right">{{ __('Grand Total') }}</td>
                                <td class="pr-0 text-right total-amount">
                                    {{ format_currency($sale->total_amount) }}
                                </td>
                            </tr>
                    </tbody>
                </table>

                @if($sale->term)
                    <p>
                        {{ __('Notes') }}: {!! $sale->term !!}
                    </p>
                @endif

                <p>
                    Délai de paiement: {{ payment_term($sale->payment_term) }}
                </p>
                @if($sale->shipping_date)
                <p>
                    Date de livraison prévue: {{ \Carbon\Carbon::parse($sale->shipping_date)->format('d/m/Y') }}
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
