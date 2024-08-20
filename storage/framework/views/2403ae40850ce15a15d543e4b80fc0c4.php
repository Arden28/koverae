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
<?php if (isset($component)) { $__componentOriginal6367f84c6a4f9cadaa1dbe2db5ffa335 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6367f84c6a4f9cadaa1dbe2db5ffa335 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.action-bar.send-email','data' => ['value' => $value,'status' => $status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.action-bar.send-email'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6367f84c6a4f9cadaa1dbe2db5ffa335)): ?>
<?php $attributes = $__attributesOriginal6367f84c6a4f9cadaa1dbe2db5ffa335; ?>
<?php unset($__attributesOriginal6367f84c6a4f9cadaa1dbe2db5ffa335); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6367f84c6a4f9cadaa1dbe2db5ffa335)): ?>
<?php $component = $__componentOriginal6367f84c6a4f9cadaa1dbe2db5ffa335; ?>
<?php unset($__componentOriginal6367f84c6a4f9cadaa1dbe2db5ffa335); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Startup\koverae\storage\framework\views/0123f55d652daf980f1ab3fc575cf0c9.blade.php ENDPATH**/ ?>