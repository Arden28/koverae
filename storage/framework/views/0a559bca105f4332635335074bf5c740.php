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
    <!-- Payment Terms -->
    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
        <label class="k_form_label">
            <?php echo e($value->label); ?> :
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model="<?php echo e($value->model); ?>" class="k-autocomplete-input-0 k_input" id="company_id_0">
            <option value=""></option>
            <option selected value="immediate_payment"><?php echo e(__('Paiement Immédiat')); ?></option>
            <option value="7_days"><?php echo e(__('7 Jours')); ?></option>
            <option value="15_days"><?php echo e(__('15 Jours')); ?></option>
            <option value="21_days"><?php echo e(__('21 Jours')); ?></option>
            <option value="30_days"><?php echo e(__('30 Jours')); ?></option>
            <option value="45_days"><?php echo e(__('45 Jours')); ?></option>
            <option value="end_of_next_month"><?php echo e(__('Fin du mois suivant')); ?></option>
        </select>
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = [$value->model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/select/payment_term.blade.php ENDPATH**/ ?>