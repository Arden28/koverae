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

<!--[if BLOCK]><![endif]--><?php if($value == 'Pending'): ?>
    <span class="badge bg-info">
       <?php echo e(__('Factures en attentes')); ?>

    </span>
<?php elseif($value == 'Partial'): ?>
    <span class="badge bg-primary">
        <?php echo e(__('Partiellement facturé')); ?>

    </span>
<?php else: ?>
    <span class="badge bg-success">
        <?php echo e(__('Entièrement facturé')); ?>

    </span>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/status/purchase-invoice-status.blade.php ENDPATH**/ ?>