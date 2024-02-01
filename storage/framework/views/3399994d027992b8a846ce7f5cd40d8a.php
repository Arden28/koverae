<div class="row">

    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--[if BLOCK]><![endif]--><?php if(module($module->slug)): ?>
        <div class="col-3 col-md-2 k_draggable p-1 p-md-2 cursor-pointer">
            <a wire:click.prevent="openApp(<?php echo e($module->id); ?>)" class="k_app k_menuitem d-flex flex-column justify-content-start align-items-center w-100 rounded">
                <img src="<?php echo e(asset('assets/images/apps/'.$module->icon.'.png')); ?>" alt="" class="k_app_icon rounded">

                <div class="k_caption w-100 text-center text-truncate mt-2">
                    <?php echo e($module->name); ?>

                </div>
            </a>
        </div>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->

    <div class="col-3 col-md-2 k_draggable p-1 p-md-2">
        <a href="" class="k_app k_menuitem d-flex flex-column justify-content-start align-items-center w-100 rounded">
            <img src="<?php echo e(asset('assets/images/apps/todo.png')); ?>" alt="" class="k_app_icon rounded">

            <div class="k_caption w-100 text-center text-truncate mt-2">
                Todo
            </div>
        </a>
    </div>
    <div class="col-3 col-md-2 k_draggable p-1 p-md-2">
        <a href="<?php echo e(route('settings.general', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="k_app k_menuitem d-flex flex-column justify-content-start align-items-center w-100 rounded">
            <img src="<?php echo e(asset('assets/images/apps/settings.png')); ?>" alt="" class="k_app_icon rounded">

            <div class="k_caption w-100 text-center text-truncate mt-2">
                Paramètre
            </div>
        </a>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/module/main-list.blade.php ENDPATH**/ ?>