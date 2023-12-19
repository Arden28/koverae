<div>
    <div class="k_form_sheet_bg">
        <!-- Notify -->
        <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form wire:submit.prevent="storeEmp()">
            <?php echo csrf_field(); ?>
            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">

                    <button type="button" id="top-button" class="btn btn-primary">
                        <span>
                            <?php echo e(__('Nouveau')); ?>

                        </span>
                    </button>

                    <button type="submit" wire:target="storeEmp()" id="top-button" class="btn btn-primary">
                        <span>
                            <?php echo e(__('Enregistrer')); ?>

                        </span>
                    </button>

                    <!-- Dropdown button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Demande de signature')); ?></a></li>
                        <li><a class="dropdown-item" href="#"><?php echo e(__('plan de lancement')); ?></a></li>
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
                        <!-- Name -->
                        <h1 class="d-flex flex-row align-items-center">
                            <input type="text"wire:model="name" class="k_input" id="name_k" placeholder="Nom de l'employé">
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
                        <h2>
                            <input type="text" wire:model="jobTitle" class="k_input" id="job_title" placeholder="Poste de travail">
                        </h2>

                        <!-- tags -->
                        <!--<div class="k_field_tags d-inline-flex flex-wrap gap-1 k_tags_input k_input">
                            <div class="k-autocomplete dropdown">
                                <input type="text" id="category_input_0 k-autocomplete-input k_input">
                            </div>
                        </div>-->

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
                        <!-- Input Form Label -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Téléphone portable')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <input type="tel" wire:model="phone" class="k_input" id="mobile_phone_0" placeholder="Ex: +242069481592">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Input Form Label -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Téléphone professionnel')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <input type="tel" wire:model="mobile" class="k_input" id="work_phone_0" placeholder="Ex: +242069481592">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Input Form Label -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Adresse email professionnelle')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <input type="email" wire:model="email" class="k_input" id="work_email_0" placeholder="Ex: nom@example.com">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Input Form Label -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Entreprise')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select wire:model="society" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                <option value="<?php echo e(current_company()->id); ?>"><?php echo e(current_company()->name); ?></option>
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['society'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                    </div>
                    <!-- Right Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">
                        <!-- Input Form Label -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Département')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select wire:model="department" class="k-autocomplete-input k_input" id="department_id_0">
                                <option value=""></option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- JobTitle -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Poste de travail')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select wire:model="job" class="k-autocomplete-input k_input" id="job_id_0">
                                <option value=""></option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($j->id); ?>"><?php echo e($j->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['job'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Input Form Label -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Manager')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select wire:model="manager" class="k-autocomplete-input-0 k_input" id="manager_id_0">
                                <option value=""></option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($manager->id); ?>"><?php echo e($manager->user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['manager'];
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

                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#profesionnal"><?php echo e(__('Informations professionnelles')); ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#personal"><?php echo e(__('Informations personnelles')); ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#rh"><?php echo e(__('Paramètre RH')); ?></a>
                        </li>
                    </ul>
                </div>
                <!-- Tab Content -->

                    <!-- Professionnal -->
                    <div class="tab-pane active show" id="profesionnal">
                        <div class="row">
                            <!-- Left Side -->
                            <div class="k_work_employee_main col-lg-8 flex-grow-0">
                                <!-- Localisation -->
                                <div class="k_inner_group col-md-12 col-lg-12">
                                    <!-- separator -->
                                    <div class="g-col-sm-2">
                                        <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                            <?php echo e(__('Emplacement')); ?>

                                        </div>
                                    </div>

                                    <!-- Professionnal address -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__('Adresse professionnelle')); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                        <select wire:model.defer="societyAddress" class="k-autocomplete-input-0 k_input" id="company_address_0">
                                            <option value="">Banéo</option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['societyAddress'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>

                                    <!-- Work Place -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__('Lieu de travail')); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                        <select wire:model="workplace" class="k-autocomplete-input-0 k_input" id="work_place_0">
                                            <option value=""></option>
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $workplaces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($w->id); ?>"><?php echo e($w->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['workplace'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>

                                </div>

                                <div class="k_inner_group col-md-12 col-lg-12">
                                    <!-- separator -->
                                    <div class="g-col-sm-2">
                                        <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                            <?php echo e(__('Planning')); ?>

                                        </div>
                                    </div>
                                    <!-- Input Form Label -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__('Rôle')); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                        <select wire:model="role" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                            <option value=""></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>

                                    <!-- Input Form Label -->
                                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                        <label class="k_form_label">
                                            <?php echo e(__('Rôle par defaut')); ?> :
                                        </label>
                                    </div>
                                    <!-- Input Form -->
                                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                        <select wire:model="defaultRole" class="k-autocomplete-input-0 k_input" id="company_id_0">
                                            <option value=""></option>
                                        </select>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['defaultRole'];
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
                            <div class="k_employee_right col-lg-4 px-0 ps-lg-5 pe-lg-4">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    <?php echo e(__('Organigramme')); ?>

                                </div>
                                <div class="k_field_widget k_readonly_modifer position-relative">
                                    <div class="alert alert-azure">
                                        <b><?php echo e(__('Aucun ordre hiérarchique')); ?></b>
                                        <p><?php echo e(__('Cet employé n\'a pas de responsable ni de subordonnés.')); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal -->
                    <div class="tab-pane" id="personal">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Coordonnées Personnelles')); ?>

                                    </div>
                                </div>
                                <!-- Adresse -->
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Adresse')); ?> :
                                    </label>
                                </div>
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
                                <!-- Email -->
                                <!-- Input Form Label -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Email')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="email" wire:model="personal_email" class="k_input" id="personal_email_0" placeholder="Ex: nom@example.com">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['personal_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <!-- Phone -->
                                <!-- Input Form Label -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Téléphone')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="tel" wire:model="personal_phone" class="k_input" id="personal_phone_0">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['personal_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Bank Account -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Numéro de compte bancaire')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="bankAccount" class="k_input" id="bank_account_id">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['bankAccount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Language -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Langue')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select class="k_input" wire:model="language" id="language_id">
                                        <option value=""><?php echo e(__('Français')); ?></option>
                                    </select>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                            </div>

                            <!-- Right Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Contexte Familiale')); ?>

                                    </div>
                                </div>
                                <!-- Marital -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Etat civil')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select wire:model="marital" class="k_input" id="marital_0">
                                        <option value="single">
                                            <?php echo e(__('Célibataire')); ?>

                                        </option>
                                        <option value="married">
                                            <?php echo e(__('Marié(e)')); ?>

                                        </option>
                                        <option value="cohabitant">
                                            <?php echo e(__('Concubin(e)')); ?>

                                        </option>
                                        <option value="divorced">
                                            <?php echo e(__('Divorcé(e)')); ?>

                                        </option>
                                        <option value="widower">
                                            <?php echo e(__('Veuf(ve)')); ?>

                                        </option>
                                    </select>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['marital'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Children -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Nombre d\'enfants')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="children_no" class="k_input" id="children_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['children_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('En cas d\'urgence')); ?>

                                    </div>
                                </div>

                                <!-- Contact Name -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Nom du contact')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="contact_name" class="k_input" id="contact_name_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Contact Phone -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Numéro du contact')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="contact_phone" class="k_input" id="contact_phone_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['contact_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                            </div>

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">

                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Education')); ?>

                                    </div>
                                </div>

                                <!-- Certificate -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Niveau du certificat')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select wire:model="certificate_level" class="k_input" id="certificate_0" >
                                        <option value="bachelor"><?php echo e(__('Bachelier')); ?></option>
                                        <option value="master"><?php echo e(__('Master')); ?></option>
                                        <option value="phd"><?php echo e(__('Docteur')); ?></option>
                                        <option value="others"><?php echo e(__('Autre')); ?></option>
                                    </select>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['certificate_level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Study field -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Champ d\'étude')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="study_field" class="k_input" id="study_field_0">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['study_field'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Study school -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Etablissement scolaire')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="school" class="k_input" id="school_0">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['school'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Permis de travail')); ?>

                                    </div>
                                </div>

                                <!-- Visa No -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('N° de visa')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="visa_no" class="k_input" id="visa_no_0">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['visa_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Permit No -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('N° de permit de travail')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="work_permit_no" class="k_input" id="permit_no_0">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['work_permit_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Visa Expiration -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Date d\'expiration du visa')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="date" wire:model="visa_expiration_date" class="k_input" id="visa_expiration_date_0">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['visa_expiration_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Permit Expiration -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Date d\'expiration du permit de travail')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="date" wire:mode="work_permit_expiration_date" class="k_input" id="permit_expiration_date_0">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['work_permit_expiration_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Permit File -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Permit de travail')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <div class="k_field_widget k_field_work_permit_upload">
                                        <label for="" class="k_select_field_button btn btn-secondary">
                                            <span>
                                                <?php echo e(__('Chargez votre fichier')); ?>

                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Right Side -->
                            <div class="k_inner_group col-lg-6">

                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Citoyenneté')); ?>

                                    </div>
                                </div>

                                <!-- Nationnality -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Nationnalité (pays)')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select wire:model="nationality" class="k_input" id="nationnality_0" >
                                        <option value=""></option>
                                        <option value="congo">Congo</option>
                                    </select>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- CNI -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('N° CNI')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="national_id" class="k_input" id="cni_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['national_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Passport -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('N° de passeport')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="passport_no" class="k_input" id="passport_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['passport_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Gender -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Genre')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select wire:model="gender" class="k_input" id="gender_0">
                                        <option value="male"><?php echo e(__('Masculin')); ?></option>
                                        <option value="female"><?php echo e(__('Feminin')); ?></option>
                                        <option value="private"><?php echo e(__('Non précisé')); ?></option>
                                    </select>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Birthday -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Date de naissance')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="date" wire:model="birthday" class="k_input" id="birthday_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Place of birth -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Lieu de naissance')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="text" wire:model="birth_place" class="k_input" id="birth_place_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['birth_place'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Country of birth -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Pays de naissance')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="date" wire:model="birth_country" class="k_input" id="birth_country_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['birth_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <!-- Non redident -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('N\'est pas un résident')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="checkbox" wire:model="is_resident" class="form-check-input" id="is_non_resident_0" >
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['is_resident'];
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

                    <!-- HR Settings -->
                    <div class="tab-pane" id="rh">
                        <div class="row align-items-start">

                            <!-- Left Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Status')); ?>

                                    </div>
                                </div>

                                <!-- Employee Type -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Type d\'employé')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select wire:model="employeeType" class="k_input" id="employee_type_1">
                                        <option value="employee">
                                            <?php echo e(__('Employé(e)')); ?>

                                        </option>
                                        <option value="student">
                                            <?php echo e(__('Etudiant(e)')); ?>

                                        </option>
                                        <option value="intern">
                                            <?php echo e(__('Stagiaire')); ?>

                                        </option>
                                        <option value="contractor">
                                            <?php echo e(__('Contractant')); ?>

                                        </option>
                                        <option value="freelance">
                                            <?php echo e(__('Travailleur indépendant')); ?>

                                        </option>
                                    </select>
                                </div>

                                <!-- Employee User -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Utilisateur associé')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select wire:model="user" class="k_input" id="user_id_1">
                                        <option value="<?php echo e(Auth::user()->id); ?>">
                                            <?php echo e(Auth::user()->name); ?>

                                        </option>
                                    </select>
                                </div>

                            </div>
                            <!-- Right Side -->
                            <div class="k_inner_group col-lg-6">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        <?php echo e(__('Présence / Point de vente')); ?>

                                    </div>
                                </div>

                                <!-- ID Badge -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('ID du badge')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="k_row">
                                    <input type="text" class="k_input" id="qr_code_badge">
                                    <button class="btn btn-link">
                                        <?php echo e(__('Générer un code')); ?>

                                    </button>
                                </div>

                                <!-- PIN code -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        <?php echo e(__('Code PIN')); ?> :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <input type="number" class="k_input" id="pin_code_0">
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </form>

    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/livewire/employees/create.blade.php ENDPATH**/ ?>