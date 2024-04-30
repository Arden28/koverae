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

<div class="k-checkbox form-check d-inline-block">
    <input type="checkbox" class="form-check-input" disabled <?php echo e($value === true ? 'checked' : ''); ?> value="<?php echo e($value); ?>" style="color: #0E6163" onclick="checkStatus(this)">
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/checkbox.blade.php ENDPATH**/ ?>