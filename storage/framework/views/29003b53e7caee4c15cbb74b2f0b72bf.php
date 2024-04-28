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
            <div class="mt16">
                <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                    <div class=" content-group">
                        <input id="annual_inventory_day_0 " type="text" class="k_input w-5" wire:model="annual_inventory_day">
                        <select class="k_input w-50" id="" wire:model="annual_inventory_month">
                            <option value=""></option>
                            <option value="january">Janvier</option>
                            <option value="february">Février</option>
                            <option value="march">Mars</option>
                            <option value="april">Avril</option>
                            <option value="may">Mai</option>
                            <option value="june">Juin</option>
                            <option value="jully">Juilet</option>
                            <option value="august">Août</option>
                            <option value="september">Septembre</option>
                            <option value="october">Octobre</option>
                            <option value="november">Novembre</option>
                            <option value="december">Décembre</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/blocks/boxes/inventory/annual-inventory.blade.php ENDPATH**/ ?>