<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'index',
    'input',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'index',
    'input',
]); ?>
<?php foreach (array_filter(([
    'value',
    'index',
    'input',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<!--[if BLOCK]><![endif]--><?php if($this->editingIndex === $index): ?>
<div>
    <input type="text"
        wire:keydown.enter="save(<?php echo e($index); ?>)"
        wire:blur="save(<?php echo e($index); ?>)"
        wire:model="<?php echo e($value->model); ?>"
        data-focus="true" class="k_input">
</div>
<?php else: ?>
    <div class="w-100" wire:click.prevent="toggleEditing(<?php echo e($index); ?>)">
        <span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    </div>
<?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/cart/columns/column.blade.php ENDPATH**/ ?>