<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value'
]); ?>
<?php foreach (array_filter(([
    'value'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="mt-3 ps-3">
    <!--[if BLOCK]><![endif]--><?php if($value->label): ?>
    <span>
        <?php echo e($value->label); ?> : 
    </span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($value->type == 'select'): ?>
    <div class="flex-wrap gap-1 k_field_tags d-inline-flex k_tags_input k_input">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $value->data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="w-auto k_tag d-inline-flex align-items-center badge rounded-pill k_tag_color_0">
            <div class="k_tag_badge_text text-truncate">
                <?php echo e($data); ?>

                <a wire:click="" wire:tagert="" class="opacity-75 cursor-pointer k_delete opacity-100-hover ps-1">
                    <i class="bi bi-x <?php echo e($this->blocked ? 'd-none' : ''); ?>"></i>
                </a>
            </div>
        </span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <input type="<?php echo e($value->type); ?>" wire:model="<?php echo e($value->model); ?>" class="w-auto k_input" placeholder="<?php echo e($value->placeholder); ?>" id="<?php echo e($value->model); ?>">
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    
    
    <i class="cursor-pointer bi bi-arrow-right-short fw-bold"></i>
</div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/input/tag/select-tag-input.blade.php ENDPATH**/ ?>