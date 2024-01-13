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
<?php
    $location = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::find($value);
    $parent = \Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation::find($location->parent_id);
?>

<div>
    <a style="text-decoration: none" wire:navigate href="<?php echo e($this->showRoute($id)); ?>"  tabindex="-1">
        <!--[if BLOCK]><![endif]--><?php if(isset($parent)): ?>
            <?php echo e($parent->name); ?>/<?php echo e($location->name); ?>

        <?php else: ?>
            <?php echo e($location->name); ?>

        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
    </a>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/columns/common/operation/location.blade.php ENDPATH**/ ?>