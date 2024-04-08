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
<?php
    $pos = \Modules\Pos\Entities\Pos\Pos::find($value);
?>
<div>
    <a wire:navigate href="<?php echo e(route('pos.show', ['pos' => $pos->id, 'subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>"class=" text-decoration-none">
        <?php echo e($pos->name); ?>

    </a>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/pos/point-of-sale.blade.php ENDPATH**/ ?>