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
<?php if (isset($component)) { $__componentOriginalcdc6007d6fa8d29546c6944ee5ac26e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcdc6007d6fa8d29546c6944ee5ac26e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.boxes.inventory.storage-location','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blocks.boxes.inventory.storage-location'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcdc6007d6fa8d29546c6944ee5ac26e7)): ?>
<?php $attributes = $__attributesOriginalcdc6007d6fa8d29546c6944ee5ac26e7; ?>
<?php unset($__attributesOriginalcdc6007d6fa8d29546c6944ee5ac26e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcdc6007d6fa8d29546c6944ee5ac26e7)): ?>
<?php $component = $__componentOriginalcdc6007d6fa8d29546c6944ee5ac26e7; ?>
<?php unset($__componentOriginalcdc6007d6fa8d29546c6944ee5ac26e7); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Startup\koverae\storage\framework\views/875d4093ad0116192e0145cb0c3d2afa.blade.php ENDPATH**/ ?>