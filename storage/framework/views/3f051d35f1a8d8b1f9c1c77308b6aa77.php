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

                <!-- Purchase Order Approval -->
                <div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

                    <!-- Left pane -->
                    <div class="k_setting_left_pane">
                        <div class="k_field_widget k_field_boolean">
                            <div class="k-checkbox form-check d-inline-block">
                                <input type="checkbox" wire:model.live="<?php echo e($value->model); ?>" class="form-check-input">
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
                        <!--[if BLOCK]><![endif]--><?php if($this->has_approval_order): ?>
                        <div class="mt16 ps-3 d-flex">
                            <span class=" w-auto">Montant minimum :</span>
                            
                            <div class="row">
                            <input type="text" style="width: 50%;" wire:model="min_amount" class="k_input col-6" id="<?php echo e($value->key); ?>_0">
                                <span class="col-6" style="width: 50%; margin: 0 0 12px 0;">XAF</span>
                            </div>
                        </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>

                </div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/blocks/boxes/minimum-amount.blade.php ENDPATH**/ ?>