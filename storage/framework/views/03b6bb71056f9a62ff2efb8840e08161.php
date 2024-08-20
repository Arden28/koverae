<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
]); ?>
<?php foreach (array_filter(([
    'value',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<!--[if BLOCK]><![endif]--><?php if($value == 'storable'): ?>
    <p>
       <?php echo e(__('Produit stockable')); ?>

    </p>
<?php elseif($value == 'consumable'): ?>
    <p>
        <?php echo e(__('Consommable')); ?>

    </p>
<?php elseif($value == 'service'): ?>
    <p>
        <?php echo e(__('Service')); ?>

    </p>
<?php else: ?>
    <p>
        <?php echo e(__('Frais de reservation')); ?>

    </p>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/columns/common/product/type.blade.php ENDPATH**/ ?>