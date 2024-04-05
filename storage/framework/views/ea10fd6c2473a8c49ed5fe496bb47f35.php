<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html"/>
        <title><?php echo e(__('Facture')); ?> - <?php echo e($invoice->reference); ?> | <?php echo e(current_company()->name); ?></title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo/favicon.ico')); ?>" />

        <link rel="stylesheet" href="<?php echo e(public_path('b3/bootstrap.min.css')); ?>">

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
                <img src="<?php echo e(base_path('public/assets/images/logo/logo-black-gd.png')); ?>" alt="logo" />
            </div>
        </div>

        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong><?php echo e(current_company()->name); ?></strong>
                        </h4>

                        <?php if(current_company()->address): ?>
                            <p class="company-address">
                                <?php echo e(__('Adresse')); ?>: <?php echo e(current_company()->address); ?>

                            </p>
                        <?php endif; ?>

                        <?php if(current_company()->country): ?>
                            <p class="company-country">
                                <?php echo e(__('Pays')); ?>: <?php echo e(current_company()->country); ?>

                            </p>
                        <?php endif; ?>

                        <?php if(current_company()->phone): ?>
                            <p class="company-phone">
                                <?php echo e(__('Téléphone')); ?>: <?php echo e(current_company()->phone); ?>

                            </p>
                        <?php endif; ?>

                        <?php if(current_company()->email): ?>
                            <p class="company-email">
                                <?php echo e(__('Adresse e-mail')); ?>: <?php echo e(current_company()->email); ?>

                            </p>
                        <?php endif; ?>

                        <?php if(current_company()->code): ?>
                            <p class="company-code">
                                <?php echo e(__('Code')); ?>: <?php echo e(current_company()->code); ?>

                            </p>
                        <?php endif; ?>

                        <?php if(current_company()->vat): ?>
                            <p class="company-vat">
                                <?php echo e(__('TVA')); ?>: <?php echo e(current_company()->vat); ?>

                            </p>
                        <?php endif; ?>

                        <?php if(current_company()->rccm): ?>
                            <p class="company-rccm">
                                <?php echo e(__('TVA')); ?>: <?php echo e(current_company()->rccm); ?>

                            </p>
                        <?php endif; ?>

                        <?php if(current_company()->niu): ?>
                            <p class="company-niu">
                                <?php echo e(__('TVA')); ?>: <?php echo e(current_company()->niu); ?>

                            </p>
                        <?php endif; ?>

                    </td>
                    <td class="border-0 pl-0" width="60%">
                        <h4 class="text-uppercase cool-gray">
                            <strong><?php echo e(__('Facture')); ?> <?php echo e($invoice->reference); ?></strong>
                        </h4>
                        <p><?php echo e(__('Date de la facture')); ?>: <strong><?php echo e(\Carbon\Carbon::parse($invoice->date)->format('d/m/Y')); ?></strong></p>
                        <p><?php echo e(__("Date d'échéance")); ?>: <strong><?php echo e(\Carbon\Carbon::parse($invoice->expected_date)->format('d/m/Y')); ?></strong></p>
                        <p><?php echo e(__("Vendeur")); ?>: <?php echo e($seller->user->name); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>

        
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
                        <?php if($customer->name): ?>
                            <p class="customer-name">
                                <strong><?php echo e($customer->name); ?></strong>
                            </p>
                        <?php endif; ?>

                        <?php if($customer->phone): ?>
                            <p class="customer-phone">
                                <?php echo e(__('Téléphone')); ?>: <?php echo e($customer->phone); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($customer->email): ?>
                            <p class="customer-email">
                                <?php echo e(__('Adresse e-mail')); ?>: <?php echo e($customer->email); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($customer->address): ?>
                            <p class="customer-address">
                                <?php echo e(__('Adresse')); ?>: <?php echo e($customer->address); ?>

                            </p>
                        <?php endif; ?>
                    </td>
                </tr>
                    </tbody>
                </table>

                
                <table class="table table-items">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 pl-0"><?php echo e(__('Description')); ?></th>
                            <th scope="col" class="text-center border-0"><?php echo e(__('Quantité')); ?></th>
                            <th scope="col" class="text-right border-0"><?php echo e(__('Prix Unitaire')); ?></th>
                            <?php if($invoice->product_discount_percentage): ?>
                                <th scope="col" class="text-right border-0"><?php echo e(__('Réduction')); ?></th>
                            <?php endif; ?>
                            <?php if($invoice->tax_percentage): ?>
                                <th scope="col" class="text-right border-0"><?php echo e(__('Taxe')); ?></th>
                            <?php endif; ?>
                            <th scope="col" class="text-right border-0 pr-0"><?php echo e(__('Sub total')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $invoice->invoiceDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="border-bottom: 1px solid #dee2e6;">
                            <td class="pl-0">
                                <?php echo e($item->product_name); ?> <br>
                                <span class="badge badge-success" style="font-size: 10px;">
                                    <?php echo e($item->product_code); ?>

                                </span>
                            </td>
                            <td class="text-center">
                                <?php echo e($item->quantity); ?> Unité(s)
                            </td>
                            <td class="text-right">
                                <?php echo e(format_currency($item->unit_price / 100)); ?>

                            </td>
                            <?php if($invoice->product_discount_amount): ?>
                                <td class="text-right">
                                    <?php echo e(format_currency($item->product_discount_amount / 100)); ?>

                                </td>
                            <?php endif; ?>
                            <td class="text-right">
                                <?php echo e(format_currency($item->product_tax_amount ?? 0)); ?>

                            </td>

                            <td class="text-right pr-0">
                                <?php echo e(format_currency($item->sub_total / 100)); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if($invoice->discount_amount > 0): ?>
                            <tr>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td class="text-right pl-0"><?php echo e(__('Réduction')); ?> (<?php echo e($invoice->discount_percentage); ?>)%</td>
                                <td class="text-right pr-0">
                                    <?php echo e(format_currency($invoice->discount_amount / 100)); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php if($invoice->tax_amount > 0): ?>
                            <tr>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td class="text-right pl-0"><?php echo e(__('Taxe')); ?>  (<?php echo e($invoice->tax_percentage); ?>%)</td>
                                <td class="text-right pr-0">
                                    <?php echo e(format_currency($invoice->tax_amount / 100)); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php if($invoice->tax_rate): ?>
                            <tr>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td class="text-right pl-0"><?php echo e(__('invoices::invoice.tax_rate')); ?></td>
                                <td class="text-right pr-0">
                                    <?php echo e($invoice->tax_percentage); ?>%
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php if($invoice->shipping_amount > 0): ?>
                            <tr>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td class="text-right pl-0"><?php echo e(__('Livraison')); ?></td>
                                <td class="text-right pr-0">
                                    <?php echo e(format_currency($invoice->shipping_amount / 100)); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
                            <tr>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td class="text-right pl-0"><?php echo e(__('Montant hors taxe')); ?></td>
                                <td class="text-right pr-0">
                                    <?php echo e(format_currency($invoice->total_amount / 100)); ?>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td class="text-right pl-0"><?php echo e(__('Total')); ?></td>
                                <td class="text-right pr-0">
                                    <?php echo e(format_currency($invoice->total_amount / 100)); ?>

                                </td>
                            </tr>
                            <?php if($invoice->invoicePayments): ?>
                                <?php $__currentLoopData = $invoice->invoicePayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                    <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                    <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                    <td class="text-right pl-0">Payé le <?php echo e(\Carbon\Carbon::parse($payment->date)->format('d/m/Y')); ?></td>
                                    <td class="text-right pr-0">
                                        <?php echo e(format_currency($payment->amount / 100)); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php if($invoice->paid_amount): ?>
                            <tr>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                                <td class="text-right pl-0"><?php echo e(__('Montant dû')); ?></td>
                                <td class="text-right pr-0 total-amount">
                                    <?php echo e(format_currency($invoice->due_amount / 100)); ?>

                                </td>
                            </tr>
                            <?php endif; ?>
                    </tbody>
                </table>

                <?php if($invoice->term): ?>
                    <p>
                        <?php echo e(__('Notes')); ?>: <?php echo $invoice->term; ?>

                    </p>
                <?php endif; ?>

                <p>
                    Veuillez utiliser cette reference pour votre paiement: <?php echo e($invoice->reference); ?>

                </p>

                <p>
                    Délai de paiement: <?php echo e(payment_term($invoice->payment_term)); ?>

                </p>

                <?php if($invoice->shipping_date): ?>
                <p>
                    Date de livraison prévue: <?php echo e(\Carbon\Carbon::parse($invoice->shipping_date)->format('d/m/Y')); ?>

                </p>
                <?php endif; ?>

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
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/print-invoice.blade.php ENDPATH**/ ?>