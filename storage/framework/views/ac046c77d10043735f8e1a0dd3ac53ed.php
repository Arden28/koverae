<?php $__env->startSection('title', $name); ?>
<div>
    <div class="k_form_sheet_bg">
        <!-- Notify -->
        <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form wire:submit.prevent="updateContact(<?php echo e($contact->id); ?>)">
            <?php echo csrf_field(); ?>
            <!-- Status bar -->
            <div class="k_form_statbar position-relative d-flex justify-content-between align-items-center mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statsbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                    <!--[if BLOCK]><![endif]--><?php if(module('crm')): ?>
                    <button type="button" id="opportunity" class="btn ke_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0">
                        <i class="k_button_icon bi bi-star-fill"></i>
                        <div class="div">
                            <span class="k_stat_text">
                                <?php echo e(__('Opportunités')); ?>

                            </span>
                            <span class="k_stat_info">
                                0
                            </span>
                        </div>
                    </button>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if(module('sales')): ?>
                    <button type="button" id="sale" class="btn ke_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0">
                        <i class="k_button_icon bi bi-currency-dollar"></i>
                        <div class="div">
                            <span class="k_stat_text">
                                <?php echo e(__('Ventes')); ?>

                            </span>
                            <span class="k_stat_info">
                                0
                            </span>
                        </div>
                    </button>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if(module('purchase') || module('inventory')): ?>
                    <button type="button" id="purchase" class="btn ke_stat_button btn-outline-secondary flex-grow-1 flex-lg-grow-0">
                        <i class="k_button_icon bi bi-credit-card-fill"></i>
                        <div class="div">
                            <span class="k_stat_text">
                                <?php echo e(__('Achats')); ?>

                            </span>
                            <span class="k_stat_info">
                                0
                            </span>
                        </div>
                    </button>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if(module('employee')): ?>
                    <button type="button" id="employee" class="btn ke_stat_button employee btn-outline-secondary flex-grow-1 flex-lg-grow-0">
                        <i class="k_button_icon bi bi-person-fill"></i>
                        <div class="div">
                            <span class="k_stat_text">
                                <?php echo e(__('Employé')); ?>

                            </span>
                            <span class="k_stat_info">
                                0
                            </span>
                        </div>
                    </button>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                    <!-- Dropdown button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="0">
                        Action
                        </button>
                        <ul class="dropdown-menu">

                        <!--[if BLOCK]><![endif]--><?php if(module('employee')): ?>
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0 employee d-none" href="#">
                            <i class="k_button_icon bi bi-credit-person-fill"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    <?php echo e(__('Employé')); ?>

                                </span>
                                <span class="k_stat_info">
                                        0
                                </span>
                            </div>
                        </li>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if(module('purchase') || module('inventory')): ?>
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0 purchase d-none" href="#">
                            <i class="k_button_icon bi bi-credit-card-fill"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    <?php echo e(__('Achat')); ?>

                                </span>
                                <span class="k_stat_info">
                                        0
                                </span>
                            </div>
                        </li>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php if(module('purchase')): ?>
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0" href="#">
                            <i class="k_button_icon bi bi-truck"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    <?php echo e(__('Taux de ponctualité')); ?>

                                </span>
                                <span class="k_stat_info">
                                    0
                                </span>
                            </div>
                        </li>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0" href="#">
                            <i class="k_button_icon bi bi-list-task"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    <?php echo e(__('Dette')); ?>

                                </span>
                                <span class="k_stat_info">
                                    0
                                </span>
                            </div>
                        </li>
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0" href="#">
                            <i class="k_button_icon bi bi-pencil-square"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    <?php echo e(__('Facturé')); ?>

                                </span>
                                <span class="k_stat_info">
                                    0
                                </span>
                            </div>
                        </li>
                        <li class="dropdown-item ke_stat_button btn-outline-light list flex-grow-1 flex-lg-grow-0" href="#">
                            <i class="k_button_icon bi bi-pencil-square"></i>
                            <div class="div">
                                <span class="k_stat_text">
                                    <?php echo e(__('Factures Fournisseur')); ?>

                                </span>
                                <span class="k_stat_info">
                                    0
                                </span>
                            </div>
                        </li>
                        <!--<li><hr class="dropdown-divider"></li>-->
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <div class="row justify-content-between position-relative w-100 m-0 mb-2">
                    <!-- title-->
                    <div class="ke_title mw-75 pe-2 ps-0">
                        <!-- Indiviaul Or Company -->
                        <div class="k_horizontal">
                            <div class="form-check k_radio_item">
                                <input type="radio" class="form-check-input k_radio_input" value="1" wire:model="is_company" id="enterprise" wire:click="$set('is_company', true)" />
                                <label class="form-check-label k_form_label" for="enterprise">
                                    <?php echo e(__('Entreprise')); ?>

                                </label>
                            </div>
                            <div class="form-check k_radio_item">
                                <input type="radio" class="form-check-input k_radio_input" value="0" wire:model="is_company" id="individual" wire:click="$set('is_company', false)" />
                                <label class="form-check-label k_form_label" for="individual">
                                    <?php echo e(__('Particulier')); ?>

                                </label>
                            </div>
                            <div class="form-check k_radio_item" wire:dirty>
                                <button type="submit" wire:target="updateContact(<?php echo e($contact->id); ?>)" title="Sauvegarder les changements...."><i class="bi bi-cloud-arrow-up-fill fa-xs" style="font-size: 19px;"></i></button>
                            </div>

                        </div>
                        <!-- Name -->
                        <h1 class="d-flex flex-row align-items-center">
                            <input type="text"wire:model="name" class="k_input" id="name_k" placeholder="ex: MASSAMBA Judie Brelle">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </h1>
                        <!-- Job Title -->
                        <!--[if BLOCK]><![endif]--><?php if($is_company == false): ?>
                            <h2 wire:transition>
                                <input type="text" wire:model="company_name" class="k_input" id="company_name" placeholder="<?php echo e(__("Nom de l'entreprise")); ?>">
                            </h2>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                    </div>
                    <!-- Employee Avatar -->
                    <div class="k_employee_avatar m-0 p-0">
                        <!-- Image Uploader -->
                        <img src="<?php echo e(asset('assets/images/people/default_avatar.png')); ?>" alt="" class="img img-fluid">
                        <!-- <small class="k_button_icon">
                            <i class="bi bi-circle text-success align-middle"></i>
                        </small>-->
                        <!-- Image selector -->
                        <div class="select-file d-flex position-absolute justify-content-between w100 bottom-0">
                            <button class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <!-- Left Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">
                        <!-- Adresse -->
                        <div class="k_address_format">
                            <div class="row">
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <input type="text" wire:model="street" id="street" class="k_input" placeholder="Rue 1....">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['street'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <input type="text" wire:model="street2" id="street2_0" class="k_input" placeholder="Rue 2......">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['street2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                    <input type="text" wire:model="city" id="city_0" class="k_input" placeholder="Ville">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                    <select wire:model="state" class="k_input" id="state_id_0">
                                        <option value=""><?php echo e(__('Département')); ?></option>
                                    </select>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                    <input type="text" wire:model="zip" id="zip_0" class="k_input" placeholder="Code postal">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <select wire:model="country" class="k_input" id="country_id_0">
                                        <option value=""><?php echo e(__('Pays')); ?></option>
                                    </select>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['country'];
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

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('ID Taxe')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="tax_id" class="k_input" id="tax_id_0" >
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tax_id'];
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

                        <!--[if BLOCK]><![endif]--><?php if($is_company == 0): ?>
                        <div class="d-flex" wire:transition style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('Profession')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="job" class="k_input" id="job_0" placeholder="ex: Directeur Commercial">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['job'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('Téléphone')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="tel" wire:model="phone" class="k_input" id="mobile_phone_0" placeholder="ex: +242069481592">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['phone'];
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
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('Mobile')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="tel" wire:model="mobile" class="k_input" id="work_phone_0" placeholder="ex: +242069481592">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['mobile'];
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
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('Email')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="email" wire:model="email" class="k_input" id="work_email_0" placeholder="ex: nom@example.com">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
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
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('Site internet')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <input type="text" wire:model="website" class="k_input" id="website_0" placeholder="ex: https://www.koverae.com">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($is_company == 0): ?>
                        <div class="d-flex" wire:transition style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('Titre')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                
                                <select wire:model="title" class="k-autocomplete-input k_input" id="company_id_0">
                                    <option value=""></option>
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                        <div class="d-flex" style="margin-bottom: 8px;">
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    <?php echo e(__('Tags')); ?> :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_cell k_wrap_input flex-grow-1">
                                <select wire:model="tags" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                    <option value=""></option>
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
                </div>

                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#contacts"><?php echo e(__('Adresses & Contacts')); ?></a>
                        </li>
                        <!--[if BLOCK]><![endif]--><?php if(module('accounting')): ?>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#accounting"><?php echo e(__('Comptabilité')); ?></a>
                            </li>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#sale-purchase"><?php echo e(__('Ventes & Achats')); ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#note"><?php echo e(__('Note interne')); ?></a>
                        </li>
                    </ul>
                </div>
                <!-- Tab Content -->

                    <!-- Contacts -->
                    <div class="tab-pane active show" id="contacts">
                        <div class="k_kanban_view k_field_X2many">
                            <div class="k_x2m_control_panel d-empty-none mb-4">
                                <button class="btn btn-secondary">
                                    <?php echo e(__('Ajouter')); ?>

                                </button>
                            </div>
                            <div class="k_kanban_renderer align-items-start d-flex flex-wrap justify-content-start">

                                <div class="k_kanban_card">
                                    <!-- Content -->
                                    <div class="k_kanban_card_content">
                                        <img class="k_kanban_image k_image_62_cover" src="<?php echo e(asset('assets/images/people/default_avatar.png')); ?>">
                                        <div class="k_kanban_details">
                                            <strong class="k_kanban_record_title">
                                                <span>Arden BOUET</span>
                                            </strong>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-envelope"></i>
                                                <span>laudbouetoumoussa@koverae.com</span>
                                            </div>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-phone"></i>
                                                <span>+242064074926</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="k_kanban_card">
                                    <!-- Content -->
                                    <div class="k_kanban_card_content">
                                        <img class="k_kanban_image k_image_62_cover" src="<?php echo e(asset('assets/images/apps/default.png')); ?>">
                                        <div class="k_kanban_details">
                                            <strong class="k_kanban_record_title">
                                                <span>Arden BOUET</span>
                                            </strong>
                                            <div class="d-flex align-items-baseline text-break">
                                                <i class="bi bi-envelope"></i>
                                                <span>laudbouetoumoussa@koverae.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- accounting -->
                    <div class="tab-pane" id="accounting">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Comptes Bancaires')); ?>

                                    </div>
                                </div>
                                <div class="table-responsive" style="margin-top: 10px;">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Numéro de compte')); ?></button></th>
                                                <th><button class="table-sort" data-sort="sort-name"><?php echo e(__('Banque')); ?></button></th>
                                                <th><button class="table-sort" data-sort="sort-name"><?php echo e(__("Envoie d'argent")); ?></button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span><i class="bi bi-plus-circle"></i> <?php echo e(__('Ajouter')); ?></span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td> <span style="color: white;">New</span> </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- Right Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Ecritures Comptables')); ?>

                                    </div>
                                </div>

                                <!-- Customer -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__('Compte Client')); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="account_receivable" class="k_input" id="account_receivable_1">*
                                            <option value=""></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['account_receivable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <!-- Supplier -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__('Compte Fournisseur')); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="account_payable" class="k_input" id="account_payable_1">*
                                            <option value=""></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['account_payable'];
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

                    <!-- Sale Purchase -->
                    <div class="tab-pane" id="sale-purchase">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Ventes')); ?>

                                    </div>
                                </div>

                                <!-- Employee Type -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__('Commercial')); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="seller" class="k_input" id="seller_1">*
                                            <option value=""></option>
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

                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <!-- Payment Terms -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__("Modalités de paiement")); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="sale_payment_term" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                            <option value="immediate_payment"><?php echo e(__('Paiement Immédiat')); ?></option>
                                            <option value="7_days"><?php echo e(__('7 Jours')); ?></option>
                                            <option value="15_days"><?php echo e(__('15 Jours')); ?></option>
                                            <option value="21_days"><?php echo e(__('21 Jours')); ?></option>
                                            <option value="30_days"><?php echo e(__('30 Jours')); ?></option>
                                            <option value="45_days"><?php echo e(__('45 Jours')); ?></option>
                                            <option value="end_of_next_month"><?php echo e(__('Fin du mois suivant')); ?></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['sale_payment_term'];
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
                                        <?php echo e(__('Achats')); ?>

                                    </div>
                                </div>

                                <!-- Buyer -->
                                <div class="d-flex" style="margin-bottom: 8px;">
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__('Acheteur')); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="buyer" class="k_input" id="buyer_1">*
                                            <option value=""></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['buyer'];
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
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__("Modalités de paiement")); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-grow-1">
                                        <select wire:model="purchase_payment_term" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                            <option value="immediate_payment"><?php echo e(__('Paiement Immédiat')); ?></option>
                                            <option value="7_days"><?php echo e(__('7 Jours')); ?></option>
                                            <option value="15_days"><?php echo e(__('15 Jours')); ?></option>
                                            <option value="21_days"><?php echo e(__('21 Jours')); ?></option>
                                            <option value="30_days"><?php echo e(__('30 Jours')); ?></option>
                                            <option value="45_days"><?php echo e(__('45 Jours')); ?></option>
                                            <option value="end_of_next_month"><?php echo e(__('Fin du mois suivant')); ?></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['purchase_payment_term'];
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

                    <!-- note -->
                    <div class="tab-pane" id="note">
                        <!-- Description -->
                        <div class="text-break k_cell k_wrap_input ">
                            <textarea wire:model="note" id="" cols="30" rows="30" class="k_input textearea text-word-break" placeholder="Note interne"></textarea>
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
        </form>

    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Contact\Resources/views/livewire/contact/show.blade.php ENDPATH**/ ?>