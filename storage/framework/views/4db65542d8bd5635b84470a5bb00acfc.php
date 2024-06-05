<div class="bg-white row app_list">
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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


<?php /**PATH D:\My Laravel Project\koverae-app\resources\views/livewire/module/main-list.blade.php ENDPATH**/ ?>