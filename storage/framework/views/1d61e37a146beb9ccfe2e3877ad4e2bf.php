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

<div class="d-flex h-100" style="margin-bottom: 8px;">
    <!-- Input Label -->
    <div class="k_cell k_wrap_label flex-grow-1 text-break text-900">
        <label class="k_form_label">
            <?php echo e($value->label); ?>

            <!--[if BLOCK]><![endif]--><?php if($value->help): ?>
                <sup><i class="bi bi-question-circle-fill" style="color: #0E6163" data-toggle="tooltip" data-placement="top" title="<?php echo e($value->help); ?>"></i></sup>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </label>
    </div>
    <!-- Input Form -->
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
            <!-- What is ordered -->
            <div>
                <div class="form-check k_radio_item">
                    <input type="radio" class="form-check-input k_radio_input" wire:model.blur="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" id="ordered" value="ordered"/>
                    <label class="form-check-label k_form_label" for="ordered">
                        <?php echo e(__('Facturer ce qui est commandé')); ?>

                    </label>
                </div>
            </div>
            <!-- What is delivered -->
            <div>
                <div class="form-check k_radio_item">
                    <input type="radio" class="form-check-input k_radio_input" wire:model.blur="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" id="delivered" value="delivered"/>
                    <label class="form-check-label k_form_label" for="delivered">
                        <?php echo e(__('Facturer ce qui est livré')); ?>

                    </label>
                </div>
            </div>
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

<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/checkbox/product/attribute/display-type.blade.php ENDPATH**/ ?>