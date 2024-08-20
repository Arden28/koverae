<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value','cartInstance']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value','cartInstance']); ?>
<?php foreach (array_filter((['value','cartInstance']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal08ef4afbd9c3c938ca05ef6f3c643947 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal08ef4afbd9c3c938ca05ef6f3c643947 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tabs.quotation-order','data' => ['value' => $value,'cartInstance' => $cartInstance]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tabs.quotation-order'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'cartInstance' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cartInstance)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal08ef4afbd9c3c938ca05ef6f3c643947)): ?>
<?php $attributes = $__attributesOriginal08ef4afbd9c3c938ca05ef6f3c643947; ?>
<?php unset($__attributesOriginal08ef4afbd9c3c938ca05ef6f3c643947); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08ef4afbd9c3c938ca05ef6f3c643947)): ?>
<?php $component = $__componentOriginal08ef4afbd9c3c938ca05ef6f3c643947; ?>
<?php unset($__componentOriginal08ef4afbd9c3c938ca05ef6f3c643947); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Startup\koverae\storage\framework\views/c67c29fd7a7c69e816df64c7d36187b6.blade.php ENDPATH**/ ?>