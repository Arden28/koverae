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
<?php if (isset($component)) { $__componentOriginal1074c53a831aa90ad3a4ab0b1164c5ae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1074c53a831aa90ad3a4ab0b1164c5ae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.columns.common.pos.session','data' => ['value' => $value,'id' => $id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('columns.common.pos.session'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1074c53a831aa90ad3a4ab0b1164c5ae)): ?>
<?php $attributes = $__attributesOriginal1074c53a831aa90ad3a4ab0b1164c5ae; ?>
<?php unset($__attributesOriginal1074c53a831aa90ad3a4ab0b1164c5ae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1074c53a831aa90ad3a4ab0b1164c5ae)): ?>
<?php $component = $__componentOriginal1074c53a831aa90ad3a4ab0b1164c5ae; ?>
<?php unset($__componentOriginal1074c53a831aa90ad3a4ab0b1164c5ae); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\storage\framework\views/8e8bcad68a2977aa24d7834fc0706378.blade.php ENDPATH**/ ?>