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
    <!--[if BLOCK]><![endif]--><?php if($value->type == 'link'): ?>
    <a wire:navigate href="<?php echo e($value->action); ?>" class="outline-none btn btn-link k_web_settings_access_rights">
        <i class="bi <?php echo e($value->icon); ?> k_button_icon"></i> <span><?php echo e($value->label); ?></span>
    </a>
    <?php elseif($value->type == 'modal'): ?>
    <a class="outline-none btn btn-link k_web_settings_access_rights"  onclick="Livewire.dispatch('openModal', <?php echo $value->action; ?>)">
        <i class="bi <?php echo e($value->icon); ?> k_button_icon"></i> <span><?php echo e($value->label); ?></span>
    </a>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    
    <br>
</div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/action/simple.blade.php ENDPATH**/ ?>