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
<?php
    $settings = settings();
?>

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label">
            <?php echo e($value->label); ?>

            <!--[if BLOCK]><![endif]--><?php if($value->help): ?>
                <sup><i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="<?php echo e($value->help); ?>"></i></sup>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="row">
            <!--[if BLOCK]><![endif]--><?php if($settings->default_currency_position == 'prefix'): ?>
                <span class="col-6" style="width: 30%; margin: 0 0 12px 0;"><?php echo e($settings->currency->symbol); ?></span>
                <input type="<?php echo e($value->type); ?>" style="width: 50%;" wire:model="<?php echo e($value->model); ?>" min="0" class="k_input" placeholder="<?php echo e($value->placeholder); ?>" id="amount" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
            <?php else: ?>
                <input type="<?php echo e($value->type); ?>" style="width: 30%;" wire:model="<?php echo e($value->model); ?>" min="0" class="k_input" placeholder="<?php echo e($value->placeholder); ?>" id="amount" <?php echo e($this->blocked ? 'disabled' : ''); ?>>
                <span class="col-6" style="width: 30%; margin: 0 0 12px 0;"><?php echo e($settings->currency->symbol); ?></span>
                <!--[if BLOCK]><![endif]--><?php if($this->product && $this->product->taxes['sale'] ): ?>
                <span class="col-6" style="width: 40%; margin: 0 0 12px 0;">(= <?php echo e(format_currency(calculate_item_price($this->product))); ?> <?php echo e(__('translator::components.inputs.sale-price.all-included')); ?>)</span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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

<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/inputs/product/product-price.blade.php ENDPATH**/ ?>