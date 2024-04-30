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
<?php if (isset($component)) { $__componentOriginal4c5f33d8ed4fa69bf5fd2f10d07d1e6c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c5f33d8ed4fa69bf5fd2f10d07d1e6c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.inputs.select.accounting.charge-account','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('inputs.select.accounting.charge-account'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c5f33d8ed4fa69bf5fd2f10d07d1e6c)): ?>
<?php $attributes = $__attributesOriginal4c5f33d8ed4fa69bf5fd2f10d07d1e6c; ?>
<?php unset($__attributesOriginal4c5f33d8ed4fa69bf5fd2f10d07d1e6c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c5f33d8ed4fa69bf5fd2f10d07d1e6c)): ?>
<?php $component = $__componentOriginal4c5f33d8ed4fa69bf5fd2f10d07d1e6c; ?>
<?php unset($__componentOriginal4c5f33d8ed4fa69bf5fd2f10d07d1e6c); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\storage\framework\views/f89044849892f250e5ee8af171c3ac73.blade.php ENDPATH**/ ?>