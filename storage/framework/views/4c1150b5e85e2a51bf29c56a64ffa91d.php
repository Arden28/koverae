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
<!--[if BLOCK]><![endif]--><?php if($this->product_type == 'storable'): ?>
<div>
    <button class="d-none d-lg-inline-flex" type="button" onclick="Livewire.dispatch('openModal', {component: 'inventory::modal.update-quantity-modal', arguments: {product: <?php echo e($this->product); ?> } } )"  id="top-button" class="btn btn-primary <?php echo e($status == $value->primary ? 'primary' : ''); ?>">
        <span>
            <?php echo e($value->label); ?> <span wire:loading wire:target="<?php echo e($value->action); ?>" >...</span>
        </span>
    </button>
    <li class="d-lg-none"><a class="dropdown-item" onclick="Livewire.dispatch('openModal', {component: 'inventory::modal.update-quantity-modal', arguments: {product: <?php echo e($this->product); ?> } } )"><?php echo e($value->label); ?> <span wire:loading wire:target="<?php echo e($value->action); ?>" >...</span></a></li>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/button/action-bar/update-qty.blade.php ENDPATH**/ ?>