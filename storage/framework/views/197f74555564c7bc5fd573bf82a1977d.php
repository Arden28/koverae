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
<div>

    <div id="<?php echo e($value->key); ?>" class="p-3 setting_block_pos">
        <h4><b><?php echo e($value->label); ?></b></h4>
        <div class="p-1">
            <select wire:model="pos" class="w-auto k_input d-inline" style="background-color: transparent;" id="pos">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($shop->id); ?>" <?php echo e($this->pos->id = $shop->id ? 'selected' : ''); ?>><?php echo e($shop->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
            
            <span class="cursor-pointer " style="color: #017E84; font-weight: 500;" onclick="Livewire.dispatch('openModal', {component: 'settings::modal.add-language'})">
                <i class="bi bi-plus k_button_icon"></i> <span><?php echo e(__('New Shop')); ?></span>
            </span>
        </div>
    </div>

</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/templates/pos-header.blade.php ENDPATH**/ ?>