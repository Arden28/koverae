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
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0  text-break text-900">

    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="k_field_widget k_field_boolean">
            <div class="k-checkbox form-check d-inline-block">
                <input type="checkbox" wire:model="<?php echo e($value->model); ?>" class="form-check-input">
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
        <span><?php echo e($value->label); ?></span>
        <!--[if BLOCK]><![endif]--><?php if(!$value->model): ?>
            &nbsp;&nbsp;
            <input type="text" wire:model="reminder_date_before_receipt" value="0" min="0" class="k_input" id="reminder_date_before_receipt_0">
            &nbsp;&nbsp;
            jour(s) avant
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    </div>
</div>

<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/ask-confirmation.blade.php ENDPATH**/ ?>