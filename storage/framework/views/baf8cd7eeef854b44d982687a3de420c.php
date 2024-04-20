<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'status'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'status'
]); ?>
<?php foreach (array_filter(([
    'value',
    'status'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div>
    <button type="button" class="btn btn-secondary-outline  k_arrow_button <?php echo e($status == $value->primary ? 'current' : ''); ?>">
        <span>
            <?php echo e($value->label); ?>

        </span>
    </button>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/button/status-bar/simple.blade.php ENDPATH**/ ?>