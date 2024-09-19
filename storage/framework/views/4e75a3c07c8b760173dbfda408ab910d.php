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
    $unit = \Modules\Inventory\Entities\UoM\UnitOfMeasure::find($this->uom);
?>
<!--[if BLOCK]><![endif]--><?php if($this->product_type == 'storable'): ?>
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule" onclick="Livewire.dispatch('openModal', {component: 'inventory::modal.update-quantity-modal', arguments: {product: <?php echo e($this->product); ?> } } )">
    <i class="k_button_icon bi bi-inboxes"></i>
    <a style="text-decoration: none;" title="<?php echo e($value->help); ?>">
        <span class="k_horizontal_span text-truncate"><?php echo e($value->label); ?></span>
        <span class="stat_value d-none d-lg-flex">
            <?php echo e($this->product->product_quantity ?? "0,00"); ?> <?php echo e($unit->name); ?>

        </span>
    </a>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/capsules/product/stock.blade.php ENDPATH**/ ?>