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

<div class="k_kanban_view k_field_X2many">
    <div class="mb-4 k_x2m_control_panel d-empty-none">
        <button class="btn btn-secondary">
            <?php echo e(__('Add')); ?>

        </button>
    </div>
    <div class="flex-wrap k_kanban_renderer align-items-start d-flex justify-content-start">
        <!-- Address -->
        
    </div>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\resources\views/components/form/tab/group/special/contact-address.blade.php ENDPATH**/ ?>