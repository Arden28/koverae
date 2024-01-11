<div>
    <?php $__env->startSection('title', $department->name); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('employee::navbar.control-panel.department-form-panel', ['department' => $department]);

$__html = app('livewire')->mount($__name, $__params, 'jwbe8pj', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <div class="k_form_sheet_bg">
        <form wire:submit.prepend="update(<?php echo e($department->id); ?>)">
            <!-- Session message -->

            <!-- Status bar -->
            <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

                <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                    <a href="<?php echo e(route('employee.department.create', ['subdomain' => current_company()->domain_name])); ?>" wire:navigate id="top-button" class="btn btn-primary">
                        <span>
                            <?php echo e(__('Nouveau')); ?>

                        </span>
                    </a>
                    <button type="submit" id="top-button" class="btn btn-secondary">
                        <span wire:loading.remove wire:target="update(<?php echo e($department->id); ?>)">
                            <i class="bi bi-cloud-arrow-up"></i><?php echo e(__('Enregistrer')); ?>

                        </span>
                        <span wire:loading wire:target="update(<?php echo e($department->id); ?>)">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only"></span>
                            </div>
                        </span>
                    </button>

                    <!-- Dropdown button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Nouveau')); ?></a></li>
                        <li><a class="dropdown-item" href="#"><?php echo e(__('Enregistrer')); ?></a></li>
                        <!--<li><hr class="dropdown-divider"></li>-->
                        </ul>
                    </div>
                </div>

            </div>
            <!-- Sheet Card -->
            <div class="k_form_sheet position-relative">
                <div class="row align-items-start position-relative w-100 m-0 mb-2">
                    <!-- Left Side -->
                    <div class="k_inner_group col-md-6 col-lg-6">

                        <!-- Department Title -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Nom du département')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <input type="text" wire:model="name" class="k_input" id="department_0">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Manager -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Manager')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select class="k-autocomplete-input-0 k_input" wire:model.blur="manager" id="user_id_0">
                                <option value="<?php echo e(null); ?>"></option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($e->id == $department->head_id ? 'selected' : ''); ?> value="<?php echo e($e->id); ?>"><?php echo e($e->user->name); ?></option>
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

                        <!-- Parent ID -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Département parent')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select class="k-autocomplete-input-0 k_input" wire:model.defer="parent" id="department_id_0">
                                <option value=""></option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($d->id == $department->parent_id ? 'selected' : ''); ?> value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['parent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Society -->
                        <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                            <label class="k_form_label">
                                <?php echo e(__('Entreprise')); ?> :
                            </label>
                        </div>
                        <!-- Input Form -->
                        <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                            <select class="k-autocomplete-input-0 k_input" id="company_id_0">
                                <option value="">Banéo</option>
                            </select>
                        </div>

                    </div>
                    <!-- Right Side -->
                    <div class="k_widget k_widget_department_chart col-lg-6">
                        <div class="k_hr_department_chart">
                            <div class="k_horizontal_separator mb-3 text-uppercase fw-bolder small">
                                <?php echo e(__('Classification de départements')); ?>

                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="department_name ms-2 text-bold">
                                    <?php echo e($department->name); ?>

                                </span>
                                <a class="badge rounded-pill bg-white border">
                                    <span class="text-black">
                                        <?php echo e(count($department->childDepartments)); ?>

                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/livewire/department/show.blade.php ENDPATH**/ ?>