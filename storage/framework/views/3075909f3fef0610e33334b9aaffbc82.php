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
    
    <input id="<?php echo e($value->data['day']); ?>_0 " type="text" class="w-5 k_input" wire:model="<?php echo e($value->data['day']); ?>">
    <select class="k_input w-50" id="" wire:model="<?php echo e($value->data['month']); ?>">
        <option value=""></option>
        <option value="january"><?php echo e(__('January')); ?></option>
        <option value="february"><?php echo e(__('February')); ?></option>
        <option value="march"><?php echo e(__('March')); ?></option>
        <option value="april"><?php echo e(__('April')); ?></option>
        <option value="may"><?php echo e(__('May')); ?></option>
        <option value="june"><?php echo e(__('June')); ?></option>
        <option value="july"><?php echo e(__('July')); ?></option>
        <option value="august"><?php echo e(__('August')); ?></option>
        <option value="september"><?php echo e(__('September')); ?></option>
        <option value="october"><?php echo e(__('October')); ?></option>
        <option value="november"><?php echo e(__('November')); ?></option>
        <option value="december"><?php echo e(__('December')); ?></option>
    </select>
    <!--[if BLOCK]><![endif]--><?php $__errorArgs = [$value->data['day']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><?php $__errorArgs = [$value->data['month']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    <i class="cursor-pointer bi bi-arrow-right-short fw-bold"></i>
</div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/input/day-month-input.blade.php ENDPATH**/ ?>