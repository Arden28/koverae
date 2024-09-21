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
<div>
    <!--[if BLOCK]><![endif]--><?php if($value->type == 'action'): ?>
    <button class="btn <?php echo e($value->class); ?>" wire:click="<?php echo e($value->action); ?>"><?php echo e($value->label); ?></button>
    <?php elseif($value->type == 'modal'): ?>
    <button class="btn <?php echo e($value->class); ?>"  onclick="Livewire.dispatch('openModal', <?php echo $value->action; ?>)"><?php echo e($value->label); ?></button>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/modal/button/simple.blade.php ENDPATH**/ ?>