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
    <span class="" style="margin-right: 5px;">
        <?php echo e($value->label); ?>

    </span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="d-inline-block">
        <input type="<?php echo e($value->type); ?>" wire:model="<?php echo e($value->model); ?>" class="form-check-input" style="" id="<?php echo e($value->model); ?>" onclick="checkStatus(this)" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
    </div>
    
    
    
</div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/input/checkbox.blade.php ENDPATH**/ ?>