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
<?php if (isset($component)) { $__componentOriginala613f82982f35b78aa77ee85a1717cc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala613f82982f35b78aa77ee85a1717cc6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.inputs.select.product.invoice-policy','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('inputs.select.product.invoice-policy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala613f82982f35b78aa77ee85a1717cc6)): ?>
<?php $attributes = $__attributesOriginala613f82982f35b78aa77ee85a1717cc6; ?>
<?php unset($__attributesOriginala613f82982f35b78aa77ee85a1717cc6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala613f82982f35b78aa77ee85a1717cc6)): ?>
<?php $component = $__componentOriginala613f82982f35b78aa77ee85a1717cc6; ?>
<?php unset($__componentOriginala613f82982f35b78aa77ee85a1717cc6); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Project\koverae-app\storage\framework\views/1361bfe1ff6c241c2a8b0bc6876b5867.blade.php ENDPATH**/ ?>