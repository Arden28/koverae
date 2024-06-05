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
    <!-- Customer Portal -->
    <div class="k_settings_box col-12 col-lg-6 k_searchable_setting" id="<?php echo e($value->key); ?>">

        <!--Left pane -->
        <div class="k_setting_left_pane">
            <div class="k_field_widget k_field_boolean">
                <div class="k-checkbox form-check d-inline-block">
                    <input type="checkbox" wire:model.live="has_pricelist" class="form-check-input" onclick="checkStatus(this)">
                </div>
            </div>
        </div>
        <!-- Right pane -->
        <div class="k_setting_right_pane">
            <div class="mt12">
                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                    <span><?php echo e($value->label); ?></span>
                </div>
                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                    <span>
                        <?php echo e($value->description); ?>

                    </span>
                </div>
            </div>
            <div class="mt-12">
                <div class="k_field_widget k_field_radio k_light_label ps-3">
                    <div class="k_horizontal">
                        <div class="form-check k_radio_item">
                            <input type="radio" class="form-check-input k_radio_input" wire:model="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" value="multiple" id="multiple" onclick="checkStatus(this)" />
                            <label class="form-check-label k_form_label" for="multiple" data-bs-toggle="tooltip" data-bs-placement="right" title="Plusieurs prix par produit">
                                <?php echo e(__('Plusieurs')); ?>

                            </label>
                        </div>
                        <div class="form-check k_radio_item">
                            <input type="radio" class="form-check-input k_radio_input" wire:model="<?php echo e($value->model); ?>" name="<?php echo e($value->model); ?>" value="advanced" id="advanced" onclick="checkStatus(this)"/>
                            <label class="form-check-label k_form_label" for="advanced" data-bs-toggle="tooltip" data-bs-placement="right" title="Règles tarifaires avancées (remises, formules)">
                                <?php echo e(__('Avancée')); ?>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php /**PATH D:\My Laravel Project\koverae-app\resources\views/components/blocks/boxes/ratio/pricelist.blade.php ENDPATH**/ ?>