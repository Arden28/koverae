<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value'
]); ?>
<?php foreach (array_filter(([
    'value'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="mt-3 ps-3">
    <!--[if BLOCK]><![endif]--><?php if($value->label): ?>
    <span>
        <?php echo e($value->label); ?> : 
    </span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <!--[if BLOCK]><![endif]--><?php if($this->setting->default_currency_position == 'prefix'): ?>
    <span class="col-6" style="width: 30%; margin: 0 0 12px 0;"><?php echo e($this->setting->currency->symbol); ?></span>
    <input type="<?php echo e($value->type); ?>" style="width: 50%;" wire:model="<?php echo e($value->model); ?>" min="0" class="k_input" placeholder="<?php echo e($value->placeholder); ?>" id="amount">
    <?php else: ?>
        <input type="<?php echo e($value->type); ?>" style="width: 30%;" wire:model="<?php echo e($value->model); ?>" min="0" class="k_input" placeholder="<?php echo e($value->placeholder); ?>" id="amount">
        <span class="col-6" style="width: 30%; margin: 0 0 12px 0;"><?php echo e($this->setting->currency->symbol); ?></span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    
    <i class="cursor-pointer bi bi-arrow-right-short fw-bold"></i>
</div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/input/input-currency.blade.php ENDPATH**/ ?>