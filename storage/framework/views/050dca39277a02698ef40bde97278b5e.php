<div>
    <div class="row category_section_buttons" style="margin-bottom: 10px;">
        <div class="d-flex w-100 ">
            <span wire:click="changeCategory('')" class="category_button rounded-1 flex-column align-items-center justify-content-center p-1 h-100">
                <i class="bi bi-house-fill"></i>
            </span>
            <div class="d-flex w-100 section_buttons wrapper">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span wire:click="changeCategory(<?php echo e($category->id); ?>)" class="category_button flex-column align-items-center justify-content-center p-1 h-100">
                    <?php echo e($category->category_name); ?>

                </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/display/product/filter.blade.php ENDPATH**/ ?>