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

<!--[if BLOCK]><![endif]--><?php if($value == 'draft'): ?>
    <span class="badge rounded bg-info">
       <?php echo e(__('Brouillon')); ?>

    </span>
<?php elseif($value == 'ready'): ?>
    <span class="badge bg-primary">
        <?php echo e(__('Prêt')); ?>

    </span>
<?php elseif($value == 'done'): ?>
    <span class="badge bg-success">
        <?php echo e(__('Fait')); ?>

    </span>
<?php else: ?>
    <span class="badge k_tag bg-danger">
        <?php echo e(__('Annulée')); ?>

    </span>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/operation/status.blade.php ENDPATH**/ ?>