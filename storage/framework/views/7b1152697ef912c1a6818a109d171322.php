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
<!-- Invoice -->
<div class="border form-check k_radio_item">
    <i class="k_button_icon bi <?php echo e($value->icon); ?>"></i>
    <!--[if BLOCK]><![endif]--><?php if($value->type == 'link'): ?>
    <a style="text-decoration: none;" title="<?php echo e($value->help); ?>" wire:navigate href="<?php echo e($value->action); ?>">
        <span class="k_horizontal_span"><?php echo e($value->label); ?></span>
        <!--[if BLOCK]><![endif]--><?php if($value->data): ?>
        <span class="stat_value d-none d-lg-flex text-muted">
            <?php echo e($value->data['amount']); ?>

        </span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </a>
    <?php elseif($value->type == 'modal'): ?>
    <a style="text-decoration: none;" title="<?php echo e($value->help); ?>" onclick="Livewire.dispatch('openModal', <?php echo $value->action; ?>)">
        <span class="k_horizontal_span"><?php echo e($value->label); ?></span>
        <!--[if BLOCK]><![endif]--><?php if($value->data): ?>
        <span class="stat_value d-none d-lg-flex text-muted">
            <?php echo e($value->data['amount']); ?>

        </span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </a>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/form/capsule/simple.blade.php ENDPATH**/ ?>