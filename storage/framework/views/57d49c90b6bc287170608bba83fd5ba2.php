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


<div class="d-flex" style="margin-bottom: 15px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="bom">
            <?php echo e($value->label); ?>

        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <div class="mt16">
            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted" data-bs-toggle="tooltip" data-bs-placement="right" title="Cette valeur est appliquée par défaut sur tous les nouveaux produits. Ceci peut être modifié dans la fiche du produit.">
                <!-- Manufacture -->
                <div>
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" wire:model="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" id="manufacture" value="manufacture"/>
                        <label class="form-check-label k_form_label" for="manufacture">
                            <?php echo e(__('Fabriquer ce produit')); ?>

                        </label>
                    </div>
                </div>
                <!-- Kit -->
                <div>
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" wire:model="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" id="kit" value="kit"/>
                        <label class="form-check-label k_form_label" for="kit">
                            <?php echo e(__('Kit')); ?>

                        </label>
                    </div>
                </div>
                <!-- Subcontracting -->
                <div>
                    <div class="form-check k_radio_item">
                        <input type="radio" class="form-check-input k_radio_input" wire:model="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" id="subcontracting" value="subcontracting"/>
                        <label class="form-check-label k_form_label" for="subcontracting">
                            <?php echo e(__('Sous-traitant')); ?>

                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/inputs/select/bom/type.blade.php ENDPATH**/ ?>