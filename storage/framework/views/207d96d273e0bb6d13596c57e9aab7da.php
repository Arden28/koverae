<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'data'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'data'
]); ?>
<?php foreach (array_filter(([
    'value',
    'data'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            <?php echo e($value->label); ?>

        </label>
    </div>
    <!-- Input Form -->
    <div class="mb-3 k_cell k_wrap_input flex-grow-1">
        <div class="flex-wrap gap-1 k_field_tags d-inline-flex k_tags_input k_input">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->purchases_taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $tax = \Modules\Invoicing\Entities\Tax\Tax::find($tax);
            ?>

            <span class="w-auto k_tag d-inline-flex align-items-center badge rounded-pill k_tag_color_0">
                <div class="k_tag_badge_text text-truncate">
                    <?php echo e($tax->name); ?>

                    <a href="" class="opacity-75 k_delete opacity-100-hover ps-1">
                        <i class="bi bi-x <?php echo e($this->blocked ? 'd-none' : ''); ?>"></i>
                    </a>
                </div>
            </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            <input type="<?php echo e($value->type); ?>" wire:model="" class="w-auto k_input" id="taxes_id" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
        </div>
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = [$value->model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>

<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/inputs/tag/purchase_taxes.blade.php ENDPATH**/ ?>