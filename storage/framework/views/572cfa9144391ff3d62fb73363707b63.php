<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value','id']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value','id']); ?>
<?php foreach (array_filter((['value','id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal5c0f95684eaa852cb9a28947fe850a07 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c0f95684eaa852cb9a28947fe850a07 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.columns.common.product','data' => ['value' => $value,'id' => $id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('columns.common.product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c0f95684eaa852cb9a28947fe850a07)): ?>
<?php $attributes = $__attributesOriginal5c0f95684eaa852cb9a28947fe850a07; ?>
<?php unset($__attributesOriginal5c0f95684eaa852cb9a28947fe850a07); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c0f95684eaa852cb9a28947fe850a07)): ?>
<?php $component = $__componentOriginal5c0f95684eaa852cb9a28947fe850a07; ?>
<?php unset($__componentOriginal5c0f95684eaa852cb9a28947fe850a07); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\storage\framework\views/ea2d97ebc1b25026c699ab66ca5d334c.blade.php ENDPATH**/ ?>