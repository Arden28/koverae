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
<?php if (isset($component)) { $__componentOriginal8ff50ce1f062fc7ee33838884635d2d3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8ff50ce1f062fc7ee33838884635d2d3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tabs.group.light','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tabs.group.light'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8ff50ce1f062fc7ee33838884635d2d3)): ?>
<?php $attributes = $__attributesOriginal8ff50ce1f062fc7ee33838884635d2d3; ?>
<?php unset($__attributesOriginal8ff50ce1f062fc7ee33838884635d2d3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8ff50ce1f062fc7ee33838884635d2d3)): ?>
<?php $component = $__componentOriginal8ff50ce1f062fc7ee33838884635d2d3; ?>
<?php unset($__componentOriginal8ff50ce1f062fc7ee33838884635d2d3); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Project\koverae-app\storage\framework\views/935a32cf12886e19b5b8be4d1e09fdb9.blade.php ENDPATH**/ ?>