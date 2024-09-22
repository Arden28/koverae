<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'id'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'id'
]); ?>
<?php foreach (array_filter(([
    'value',
    'id'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div>
    <a style="text-decoration: none" wire:navigate href="<?php echo e($this->showRoute($id)); ?>"  tabindex="-1">
        <?php echo e($value); ?>

    </a>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/table/column/special/show-title-link.blade.php ENDPATH**/ ?>