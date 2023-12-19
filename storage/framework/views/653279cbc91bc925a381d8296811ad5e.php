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
<?php if(count($sales) >= 1): ?>
<!-- Invoice -->
<div class="form-check k_radio_item">
    <i class="k_button_icon bi bi-pencil-square"></i>
    <a style="text-decoration: none;" wire:navigate href="<?php echo e(route('sales.show', ['subdomain' => current_company()->domain_name, 'sale' => $quotation->sale->id])); ?>">
        <span class="k_horizontal_span"><?php echo e(__('Ventes')); ?> (1)</span>
    </a>
</div>
<?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/capsules/simple.blade.php ENDPATH**/ ?>