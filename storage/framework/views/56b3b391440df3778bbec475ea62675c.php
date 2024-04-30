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
<?php if (isset($component)) { $__componentOriginal7c3cc8c8cc13971d4b36d413555cf9fe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3cc8c8cc13971d4b36d413555cf9fe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.inputs.select.product.attribute.display-type','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('inputs.select.product.attribute.display-type'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3cc8c8cc13971d4b36d413555cf9fe)): ?>
<?php $attributes = $__attributesOriginal7c3cc8c8cc13971d4b36d413555cf9fe; ?>
<?php unset($__attributesOriginal7c3cc8c8cc13971d4b36d413555cf9fe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3cc8c8cc13971d4b36d413555cf9fe)): ?>
<?php $component = $__componentOriginal7c3cc8c8cc13971d4b36d413555cf9fe; ?>
<?php unset($__componentOriginal7c3cc8c8cc13971d4b36d413555cf9fe); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\storage\framework\views/92f39822c153dca6959c88315cff50d5.blade.php ENDPATH**/ ?>