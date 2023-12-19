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
<!--[if BLOCK]><![endif]--><?php if($this->invoice): ?>
<!-- Invoice -->
<div class="form-check k_radio_item">
    <i class="k_button_icon bi bi-receipt-cutoff"></i>
    <a style="text-decoration: none;" title="<?php echo e($value->help); ?>" wire:navigate href="<?php echo e(route('purchases.invoices.show', ['subdomain' => current_company()->domain_name, 'purchase' => $this->purchase->id, 'invoice' => $this->invoice])); ?>" >
        <span class="k_horizontal_span"><?php echo e($value->label); ?></span>
    </a>
</div>
<?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/capsules/purchase-invoice-capsule.blade.php ENDPATH**/ ?>