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
<?php if (isset($component)) { $__componentOriginald9794377c6c0d24bc44a5928b848dd91 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald9794377c6c0d24bc44a5928b848dd91 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.inputs.uom.weight','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('inputs.uom.weight'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald9794377c6c0d24bc44a5928b848dd91)): ?>
<?php $attributes = $__attributesOriginald9794377c6c0d24bc44a5928b848dd91; ?>
<?php unset($__attributesOriginald9794377c6c0d24bc44a5928b848dd91); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald9794377c6c0d24bc44a5928b848dd91)): ?>
<?php $component = $__componentOriginald9794377c6c0d24bc44a5928b848dd91; ?>
<?php unset($__componentOriginald9794377c6c0d24bc44a5928b848dd91); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\storage\framework\views/c605a3fb92a88cc1822a2e4b9703e94f.blade.php ENDPATH**/ ?>