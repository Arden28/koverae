<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value','status']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value','status']); ?>
<?php foreach (array_filter((['value','status']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalc5b777944633e36bfeb52d2be63a8986 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc5b777944633e36bfeb52d2be63a8986 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.capsules.sale-capsule','data' => ['value' => $value,'status' => $status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('capsules.sale-capsule'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc5b777944633e36bfeb52d2be63a8986)): ?>
<?php $attributes = $__attributesOriginalc5b777944633e36bfeb52d2be63a8986; ?>
<?php unset($__attributesOriginalc5b777944633e36bfeb52d2be63a8986); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc5b777944633e36bfeb52d2be63a8986)): ?>
<?php $component = $__componentOriginalc5b777944633e36bfeb52d2be63a8986; ?>
<?php unset($__componentOriginalc5b777944633e36bfeb52d2be63a8986); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\storage\framework\views/ea6c7fbb573eb62d8a6d2f1fe54aa3f2.blade.php ENDPATH**/ ?>