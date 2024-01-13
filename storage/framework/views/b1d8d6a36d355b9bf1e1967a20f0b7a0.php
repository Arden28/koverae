<div>
    <?php $__env->startSection('title', $reference); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sales::navbar.control-panel.sale-form-panel', ['sale' => $sale,'event' => 'update-sale']);

$__html = app('livewire')->mount($__name, $__params, 'SfocZSo', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <!-- Notify -->
    <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sales::form.sale-form', ['sale' => $sale]);

$__html = app('livewire')->mount($__name, $__params, '7N1luw8', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <div class="k_form_sheet_bg">
        <!-- Status bar -->
        <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

            <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                <!--[if BLOCK]><![endif]--><?php if($status <> 'canceled'): ?>
                <!--[if BLOCK]><![endif]--><?php if($sale->invoice == null): ?>
                <button type="button" wire:click.prevent="createInvoice(<?php echo e($sale->id); ?>)" class="btn btn-primary primary">
                    <span>
                        <?php echo e(__('Créer une facture')); ?>

                    </span>
                </button>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <button type="button" wire:click="justSendQT()" id="top-button" class="btn btn-secondary <?php echo e($sale->invoice ? 'primary' : ''); ?>">
                    <span>
                        <?php echo e(__('Envoyer par email')); ?>

                    </span>
                </button>

                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        <?php echo e(__('Aperçu')); ?>

                    </span>
                </button>

                <button type="button" wire:click.prevent="canceled(<?php echo e($sale->id); ?>)" wire:target="canceled(<?php echo e($sale->id); ?>)" id="top-button" class="btn btn-danger">
                    <span>
                        <?php echo e(__('Annuler')); ?>

                    </span>
                </button>
                <?php else: ?>
                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        <?php echo e(__('Définir un devis')); ?>

                    </span>
                </button>

                <button type="button" id="top-button" class="btn btn-secondary">
                    <span>
                        <?php echo e(__('Aperçu')); ?>

                    </span>
                </button>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!-- Dropdown button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                    </button>
                    <ul class="dropdown-menu">
                    <!--[if BLOCK]><![endif]--><?php if($status <> 'canceled'): ?>
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Créer une facture')); ?></a></li>
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Envoyer par email')); ?></a></li>
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Aperçu')); ?></a></li>
                        <!--[if BLOCK]><![endif]--><?php if($status == 'sent'): ?>
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Annuler')); ?></a></li>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    <?php else: ?>
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Définir sur devis')); ?></a></li>
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Aperçu')); ?></a></li>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    <!--<li><hr class="dropdown-divider"></li>-->
                    </ul>
                </div>
            </div>

            <div id="statusbar" class="k_statusbar_buttons_arrow d-flex align-items-center align-content-around ">

                <button type="button" class="btn btn-secondary-outline  k_arrow_button">
                    <span>
                        <?php echo e(__('Devis')); ?>

                    </span>
                </button>

                <button type="button" class="btn btn-secondary-outline  k_arrow_button">
                    <span>
                        <?php echo e(__('Envoyé')); ?>

                    </span>
                </button>

                <button type="button" class="btn btn-secondary-outline k_arrow_button <?php echo e($status != 'canceled' ? 'current' : ''); ?>">
                    <span>
                        <?php echo e(__('Bon de commande')); ?>

                    </span>
                </button>

                <!--[if BLOCK]><![endif]--><?php if($status == 'canceled'): ?>
                <button type="button" class="btn btn-danger-outline k_arrow_button <?php echo e($status == 'canceled' ? 'current' : ''); ?>">
                    <span>
                        <?php echo e(__('Annulé')); ?>

                    </span>
                </button>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

            </div>
        </div>
        <form wire:submit.prevent="updateSale(<?php echo e($sale->id); ?>)">
            <?php echo csrf_field(); ?>
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <div class="row justify-content-between position-relative w-100 m-0 mb-2">

                    <!-- Sale's assets -->
                    <div class="k_horizontal_asset">
                        <!--[if BLOCK]><![endif]--><?php if($sale->invoice): ?>
                        <!-- Invoice -->
                        <div class="form-check k_radio_item">
                            <i class="k_button_icon bi bi-receipt"></i>
                            <a style="text-decoration: none;" wire:navigate href="<?php echo e(route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $sale->id, 'invoice' => $sale->invoice->id])); ?>">
                                <span class="k_horizontal_span"><?php echo e(__('Factures')); ?> (1)</span>
                            </a>
                        </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if($sale->quotation): ?>
                        <!-- Invoice -->
                        <div class="form-check k_radio_item">
                            <i class="k_button_icon bi bi-newspaper"></i>
                            <a style="text-decoration: none;" wire:navigate href="<?php echo e(route('sales.quotations.show', ['subdomain' => current_company()->domain_name, 'quotation' => $sale->quotation_id ])); ?>">
                                <span class="k_horizontal_span"><?php echo e(__('Devis')); ?> (1)</span>
                            </a>
                        </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if($sale->transfers): ?>
                        <!-- Invoice -->
                        <div class="form-check k_radio_item">
                            <i class="k_button_icon bi bi-truck"></i>
                            <a style="text-decoration: none;" wire:navigate href="">
                                <span class="k_horizontal_span"><?php echo e(__('Livraison')); ?> (1)</span>
                            </a>
                        </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <!-- title-->
                    <div class="ke_title mw-75 pe-2 ps-0" id="new-title">

                        <!-- Name -->
                        <h1 class="d-flex flex-row align-items-center">
                            <?php echo e($reference); ?>


                            <!-- Special buttons -->
                            <div class="btn-group">
                                <button type="button" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear-fill fa-xs"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item cursor-pointer">
                                        <i class="bi bi-printer"></i> <?php echo e(__('Imprimer')); ?></a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item cursor-pointer" wire:click.prevent="duplicateSale(<?php echo e($sale->id); ?>)" wire:target="duplicateSale(<?php echo e($sale->id); ?>)" wire:confirm="Êtes-vous sûr de vouloir dupliquer cette vente ?"><i class="bi bi-copy"></i><?php echo e(__('Dupliquer')); ?></a></li>
                                <li>
                                    <a class="dropdown-item cursor-pointer" wire:click.prevent="deleteSale(<?php echo e($sale->id); ?>)" wire:target="deleteSale(<?php echo e($sale->id); ?>)" wire:confirm="Êtes-vous sûr de vouloir supprimer cette vente ?" >
                                    <i class="bi bi-trash"></i> <?php echo e(__('Supprimer')); ?>

                                    </a>
                                </li>
                                <!--[if BLOCK]><![endif]--><?php if(isset($sale->invoice->payment_status) != 'Paid'): ?>
                                <li><a class="dropdown-item" href="#"><?php echo e(__('Générer un lien de paiement')); ?></a></li>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                                <li><a class="dropdown-item" href="#"><?php echo e(__('Partager')); ?></a></li>
                                <li><a class="dropdown-item" href="#"><?php echo e(__('Changer de client')); ?></a></li>
                                </ul>
                            </div>
                            <div wire:dirty>
                                <button type="submit" wire:target="updateSale(<?php echo e($sale->id); ?>)" title="Sauvegarder les changements...."><i class="bi bi-cloud-arrow-up-fill fa-xs"></i></button>
                            </div>

                        </h1>
                    </div>

                    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <span><?php echo e(session('message')); ?></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                </div>

                <div class="row">
                    <!-- Left Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Customer -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('Client')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <span class="cursor-pointer" style="font-weight: 500; color: rgb(9, 112, 140);" id="customer_0"><?php echo e($customer_name); ?></span>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['customer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>

                    </div>
                    <!-- Right Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Date -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__("Date")); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="datetime-local" wire:model="date" class="k_input" id="date_0">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Payment Terms -->
                            <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__("Modalités de paiement")); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <select wire:model="payment_term" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                    <option value="immediate_payment"><?php echo e(__('Paiement Immédiat')); ?></option>
                                    <option value="7_days"><?php echo e(__('7 Jours')); ?></option>
                                    <option value="15_days"><?php echo e(__('15 Jours')); ?></option>
                                    <option value="21_days"><?php echo e(__('21 Jours')); ?></option>
                                    <option value="30_days"><?php echo e(__('30 Jours')); ?></option>
                                    <option value="45_days"><?php echo e(__('45 Jours')); ?></option>
                                    <option value="end_of_next_month"><?php echo e(__('Fin du mois suivant')); ?></option>
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['payment_term'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>

                    </div>
                </div>

                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#order"><?php echo e(__('Commande')); ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link d-none" data-bs-toggle="tab" href="#optional-product"><?php echo e(__('Produits Optionnel')); ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#other"><?php echo e(__('Autres Informations')); ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#summary"><?php echo e(__('Notes')); ?></a>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->

                    <!-- Order Table -->
                    <div class="tab-pane active show" id="order">
                        <!-- Order Table -->
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart.product-cart', ['cartInstance' => 'sale','data' => $sale]);

$__html = app('livewire')->mount($__name, $__params, 'VZsuCLz', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    </div>

                    <!-- Others Informations -->
                    <div class="tab-pane" id="other">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Ventes')); ?>

                                    </div>
                                </div>

                                <!-- Sales Team -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__("Equipe Commerciale")); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="sales_team" class="k_input" id="sales_team_1">
                                            <option></option>
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($t->id); ?>">
                                                    <?php echo e($t->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['sales_team'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <!-- Seller -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__("Commercial(e)")); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="seller" class="k_input" id="seller_1">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($seller->id); ?>">
                                                    <?php echo e($seller->user->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['seller'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <!-- Tags -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__("Etiquettes")); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="tags" class="k_input" id="tags_id_1">
                                            <option></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tags'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                            </div>
                            <!-- Right Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Livraison')); ?>

                                    </div>
                                </div>

                                <!-- Delivery policies -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__("Politique de livraison")); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="shipping_policy" class="k_input" id="seller_1">
                                            <option value="as_soon_as_possible">
                                                <?php echo e(__('Lorsque tous les produits sont prêts')); ?>

                                            </option>
                                            <option value="after_done">
                                                <?php echo e(__('Dès que possible')); ?>

                                            </option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['shipping_policy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <!-- Delivery date -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__("Date de livraison")); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <input wire:model="shipping_date" type="date" class="k_input" id="shipping_date_1" />
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['shipping_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <!-- Shipping status -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__("Status de la Livraison")); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="shipping_status" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                            <option value=""></option>
                                            <option value="Pending"><?php echo e(__('En attente')); ?></option>
                                            <option value="Shipped"><?php echo e(__('Livrée')); ?></option>
                                            <option value="Completed"><?php echo e(__('Complétée')); ?></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['shipping_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- summary -->
                    <div class="tab-pane" id="summary">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-12">
                                <!-- Description -->
                                <div class="text-break k_cell k_wrap_input ">
                                    <textarea wire:model="note" id="" cols="30" rows="10" class="k_input textearea" placeholder="Note interne">
                                        <?php echo $note; ?>

                                    </textarea>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                            </div>

                        </div>
                    </div>
            </div>
        </form>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sales::sale.invoice.set-invoice', []);

$__html = app('livewire')->mount($__name, $__params, 'EUPPrJh', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/livewire/sale/show.blade.php ENDPATH**/ ?>