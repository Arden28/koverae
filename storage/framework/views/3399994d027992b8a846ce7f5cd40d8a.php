<div class="row justify-content-center text-center">
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--[if BLOCK]><![endif]--><?php if(module($module->slug)): ?>
        <div class="col-3 col-md-2 ml-2 k_draggable k_app cursor-pointer">
            <a wire:click.prevent="openApp(<?php echo e($module->id); ?>)" class="k_menuitem d-flex flex-column text-decoration-none justify-content-start align-items-center w-100 rounded">
                <img src="<?php echo e(asset('assets/images/apps/'.$module->icon.'.png')); ?>" alt="" class="k_app_icon rounded">

                <div class="k_caption w-100 text-center text-truncate mt-2">
                    <?php echo e($module->name); ?>

                </div>
            </a>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>


<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/livewire/module/main-list.blade.php ENDPATH**/ ?>