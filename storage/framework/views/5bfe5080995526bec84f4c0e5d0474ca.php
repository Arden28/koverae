<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value']); ?>
<?php foreach (array_filter((['value']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal0083b0a72a1c55e14006c38a7ad7c1e4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0083b0a72a1c55e14006c38a7ad7c1e4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.inputs.input','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('inputs.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0083b0a72a1c55e14006c38a7ad7c1e4)): ?>
<?php $attributes = $__attributesOriginal0083b0a72a1c55e14006c38a7ad7c1e4; ?>
<?php unset($__attributesOriginal0083b0a72a1c55e14006c38a7ad7c1e4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0083b0a72a1c55e14006c38a7ad7c1e4)): ?>
<?php $component = $__componentOriginal0083b0a72a1c55e14006c38a7ad7c1e4; ?>
<?php unset($__componentOriginal0083b0a72a1c55e14006c38a7ad7c1e4); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Startup\koverae\storage\framework\views/3bd64fc737355d9b76a3de11cfee9d4b.blade.php ENDPATH**/ ?>