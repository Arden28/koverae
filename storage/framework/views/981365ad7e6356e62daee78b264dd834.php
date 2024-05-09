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
    $transfer = Modules\Inventory\Entities\Operation\OperationTransfer::isCompany(current_company()->id)->isBelongs($this->sale->reference)->first();
?>
<!--[if BLOCK]><![endif]--><?php if($this->sale->transfers->count() >= 1 && module('inventory')): ?>
<!-- Routes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-truck"></i>
    <a style="text-decoration: none;" title="<?php echo e($value->help); ?>" wire:navigate href="<?php echo e(route('inventory.operation-transfers.show', ['subdomain' => current_company()->domain_name, 'transfer' => $transfer->id ?? null, 'menu' => current_menu()])); ?>" >
        <span class="k_horizontal_span"><?php echo e($value->label); ?></span>
        <span class="stat_value d-none d-lg-flex">
            <?php echo e(count($this->sale->transfers)); ?>

        </span>
    </a>
</div>

<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH D:\My Laravel Project\koverae-app\resources\views/components/capsules/sale/delivery.blade.php ENDPATH**/ ?>