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

<div class="d-flex" style="margin-bottom: 8px;">
    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
        <label class="k_form_label">
            <?php echo e($value->label); ?> :
        </label>
    </div>
    <div class="k_address_format">
        <div class="row">
            <div class="col-12" style="margin-bottom: 10px;">
                <input type="text" wire:model.blur="street" id="street" class="p-0 k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?> placeholder="<?php echo e(__('Street 1 ....')); ?>">
            </div>
            <div class="col-12" style="margin-bottom: 10px;">
                <input type="text" wire:model.blur="street2" id="street2_0" class="p-0 k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?> placeholder="<?php echo e(__('Street 2 ....')); ?>">
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <input type="text" wire:model.blur="city" id="city_0" class="p-0 k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?> placeholder="<?php echo e(__('City')); ?>">
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <select wire:model="state" class="p-0 k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?> id="state_id_0">
                    <option value=""><?php echo e(__('State')); ?></option>
                </select>
            </div>
            <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                <input type="text" wire:model.blur="zip" id="zip_0" class="p-0 k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?> placeholder="<?php echo e(__('ZIP')); ?>">
            </div>
            <div class="col-12" style="margin-bottom: 10px;">
                <select wire:model.blur="country" class="p-0 k_input" <?php echo e($this->blocked ? 'disabled' : ''); ?> id="country_id_0">
                    <option value=""><?php echo e(__('Country')); ?></option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = current_company()->countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->common_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
            </div>

        </div>

    </div>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/form/input/select/address.blade.php ENDPATH**/ ?>