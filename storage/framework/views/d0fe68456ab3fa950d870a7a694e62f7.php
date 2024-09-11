
<div class="mb-4 container-xl">
    <div class="mb-2 row g-2 align-items-center">
        <div class="col">
            <h2 class="page-title">
            <?php echo e(__('My Apps')); ?>

            </h2>
        </div>
    </div>
    <ul class="mb-1 nav nav-bordered">
        <li class="nav-item">
            <a class="nav-link active" id="my-app-tab" data-bs-toggle="tab" data-bs-target="#my-app" type="button" role="tab" aria-controls="my-app" aria-selected="true" ><b><?php echo e(__('My Apps')); ?></b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="recently-used-tab" data-bs-toggle="tab" data-bs-target="#recently-used" type="button" role="tab" aria-controls="recently-used" aria-selected="true"><b><?php echo e(__('Recently Used')); ?></b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="my-favourite-tab" data-bs-toggle="tab" data-bs-target="#my-favourite" type="button" role="tab" aria-controls="my-favourite" aria-selected="true"><b><?php echo e(__('My Favourites')); ?></b></a>
        </li>
    </ul>
    <!-- App -->
    <div class="tab-content" id="nav-tabContent">
        <div class="p-2 mt-3 bg-white rounded shadow app_list tab-pane fade show active" id="my-app" role="tabpanel" aria-labelledby="my-app-tab">
            <div class="row">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = modules(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if(module($module->slug)): ?>
                    <div class="pt-2 pb-2 mb-3 rounded cursor-pointer app col-6 col-lg-3">
                        <div class="gap-1 d-flex">
                            <a class="text-decoration-none" wire:click="openApp(<?php echo e($module->id); ?>)">
                                <img src="<?php echo e(asset('assets/images/apps/'.$module->icon.'.png')); ?>" height="40px" width="40px" alt="" class="rounded app_icon">
                            </a>
                            <a href="<?php echo e(route($module->link, ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="text-decoration-none font-weight-bold" wire:click.prevent="openApp(<?php echo e($module->id); ?>)">
                                <span><?php echo e($module->short_name); ?></span>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
        <div class="p-3 mt-3 bg-white rounded shadow tab-pane fade" id="recently-used" role="tabpanel" aria-labelledby="recently-used-tab">
            <?php echo e(__("No applications have been used yet.")); ?>

        </div>
        <div class="p-3 mt-3 bg-white rounded shadow tab-pane fade" id="my-favourite" role="tabpanel" aria-labelledby="my-favourite-tab">
            <?php echo e(__("You don't have Favorites Apps.")); ?>

        </div>
    </div>

</div>


<?php /**PATH D:\My Laravel Startup\koverae\resources\views/livewire/module/main-list.blade.php ENDPATH**/ ?>