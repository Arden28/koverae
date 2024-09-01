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
<div class="k_settings_box col-12 col-lg-12 k_searchable_setting" style="width: 100%;">

    <!-- Right pane -->
    <div class="k_setting_right_pane" style="width: 100%;">
        <div class="mt-1" style="width: 100%;">
            <span>Koverae SaaS ~ v1.0 (Enterprise Edition)</span>
            <br>
            <span>Copyright © 2024</span>
            <a href="https://koverae.com" target="_blank" class="cursor-pointer">
                <?php echo e(__('Koverae Ltd')); ?>,
            </a>
            <a href="https://koverae.com/docs/v1/license" target="_blank" class="cursor-pointer">
                <?php echo e(__('Koverae Enterprise Edition License v1.0')); ?>

            </a>
        </div>
    </div>

</div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/template/about.blade.php ENDPATH**/ ?>