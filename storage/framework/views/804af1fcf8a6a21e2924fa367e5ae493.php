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
<?php if (isset($component)) { $__componentOriginal2b5e08f6f9ff0266bb0bb4b42ac67a1b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b5e08f6f9ff0266bb0bb4b42ac67a1b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blocks.boxes.input.radio','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blocks.boxes.input.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b5e08f6f9ff0266bb0bb4b42ac67a1b)): ?>
<?php $attributes = $__attributesOriginal2b5e08f6f9ff0266bb0bb4b42ac67a1b; ?>
<?php unset($__attributesOriginal2b5e08f6f9ff0266bb0bb4b42ac67a1b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b5e08f6f9ff0266bb0bb4b42ac67a1b)): ?>
<?php $component = $__componentOriginal2b5e08f6f9ff0266bb0bb4b42ac67a1b; ?>
<?php unset($__componentOriginal2b5e08f6f9ff0266bb0bb4b42ac67a1b); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Startup\koverae\storage\framework\views/6e759a4ea1f37a370c92d2f4b045010b.blade.php ENDPATH**/ ?>