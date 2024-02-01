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
<!--[if BLOCK]><![endif]--><?php if($this->sale): ?>
<!-- Ventes -->
<div class="form-check k_radio_item" id="capsule">
    <i class="k_button_icon bi bi-receipt"></i>
    <a style="text-decoration: none;" title="<?php echo e($value->help); ?>" wire:navigate  wire:navigate href="<?php echo e(route('sales.invoices.show', ['subdomain' => current_company()->domain_name, 'sale' => $this->sale->id, 'invoice' => $this->sale->invoice->id, 'menu' => current_menu()])); ?>" >
        <span class="k_horizontal_span"><?php echo e($value->label); ?></span>
        <span class="stat_value text-muted">
            1
        </span>
    </a>
</div>
<?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/capsules/invoice/sale-invoice.blade.php ENDPATH**/ ?>