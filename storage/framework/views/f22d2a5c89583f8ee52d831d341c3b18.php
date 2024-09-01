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
<!-- Developer -->
<div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

    <!-- Right pane -->
    <div class="k_setting_right_pane">
        <div class="mt12">
            <a href="https://koverae.com/docs" target="_blank" class="cursor-pointer d-block">
                <?php echo e(__('Activate the dev mode')); ?>

            </a>
            <a href="https://koverae.com/docs" target="_blank" class="cursor-pointer d-block">
                <?php echo e(__('View the documentation')); ?>

            </a>
            <a href="https://koverae.com/auth/register?seeking_for=developer_account" target="_blank" class="cursor-pointer d-block">
                <?php echo e(__('Create a Koverae Developer account')); ?>

            </a>
        </div>
    </div>

</div><?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/blocks/boxes/template/developer.blade.php ENDPATH**/ ?>