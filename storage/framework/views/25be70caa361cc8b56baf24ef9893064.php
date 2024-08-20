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
<?php if (isset($component)) { $__componentOriginal5328f52b6cbfa4e20883ba686b24a3a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5328f52b6cbfa4e20883ba686b24a3a0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.action-bar.replenish-product','data' => ['value' => $value,'status' => $status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.action-bar.replenish-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5328f52b6cbfa4e20883ba686b24a3a0)): ?>
<?php $attributes = $__attributesOriginal5328f52b6cbfa4e20883ba686b24a3a0; ?>
<?php unset($__attributesOriginal5328f52b6cbfa4e20883ba686b24a3a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5328f52b6cbfa4e20883ba686b24a3a0)): ?>
<?php $component = $__componentOriginal5328f52b6cbfa4e20883ba686b24a3a0; ?>
<?php unset($__componentOriginal5328f52b6cbfa4e20883ba686b24a3a0); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Startup\koverae\storage\framework\views/4794f8e2fb5f775f78fe98c7bed485f0.blade.php ENDPATH**/ ?>