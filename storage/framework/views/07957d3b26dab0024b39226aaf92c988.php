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
    <!-- Picking Policy -->
    <div class="k_settings_box col-12 col-lg-6 k_searchable_setting" id="<?php echo e($value->key); ?>">

        <!-- Left pane -->
        <!--[if BLOCK]><![endif]--><?php if($value->checkbox): ?>
        <div class="k_setting_left_pane">
            <div class="k_field_widget k_field_boolean">
                <div class="k-checkbox form-check d-inline-block">
                    <input type="checkbox" wire:model.live="<?php echo e($value->model); ?>" class="form-check-input" onclick="checkStatus(this)">
                </div>
            </div>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!-- Right pane -->
        <div class="k_setting_right_pane">
            <div class="mt12">
                <div class="k_field_widget k_field_chat k_read_only modify w-auto ps-3 fw-bold">
                    <span><?php echo e($value->label); ?></span>
                    <!--[if BLOCK]><![endif]--><?php if($value->help): ?>
                    <a href="<?php echo e($value->help); ?>" target="__blank" title="documentation" class="k_doc_link">
                        <i class="bi bi-question-circle-fill"></i>
                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                    <span>
                        <?php echo e($value->description); ?>

                    </span>
                </div>
            </div>
            <!--[if BLOCK]><![endif]--><?php if($this->has_shipping_sms_confirmation): ?>
            <div class="mt16">
                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3">
                    <span class=" w-">
                        Modèle de SMS
                    </span>
                    <select class="k_input" id="">
                        <option value="delivery">Livraison: Envoyé par SMS</option>
                    </select>
                </div>
            </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

    </div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/shipping/sms-confirmation.blade.php ENDPATH**/ ?>