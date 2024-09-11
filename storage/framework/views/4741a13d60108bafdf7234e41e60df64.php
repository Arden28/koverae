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
<!--[if BLOCK]><![endif]--><?php if($value->data['parent']): ?>
<div class="mt-3 ps-3">
    <!--[if BLOCK]><![endif]--><?php if($value->label): ?>
    <span>
        <?php echo e($value->label); ?> : 
    </span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($value->type == 'select'): ?>
    <select wire:model="<?php echo e($value->model); ?>" id="">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $value->data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $text): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>"><?php echo e($text); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </select>
    <?php else: ?>
    <input type="<?php echo e($value->type); ?>" wire:model="<?php echo e($value->model); ?>" class="k_input" placeholder="<?php echo e($value->placeholder); ?>" id="<?php echo e($value->model); ?>">
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <i class="cursor-pointer bi bi-arrow-right-short fw-bold"></i>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/input/depends.blade.php ENDPATH**/ ?>