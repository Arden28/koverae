<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value'
]); ?>
<?php foreach (array_filter(([
    'value'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="k_settings_box col-12 col-lg-6 k_searchable_setting">

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
        <div class="mt16">
            <div class="k_field_widget k_field_text k_read_only modify w-auto ps-3 text-muted">
                <?php
                    $products = \Modules\Inventory\Entities\Product::isCompany(current_company()->id)->get();
                ?>
                <select wire:model="<?php echo e($value->model); ?>" class="k_input" id="<?php echo e($value->key); ?>">
                    <option value=""></option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/blocks/boxes/input/simple.blade.php ENDPATH**/ ?>