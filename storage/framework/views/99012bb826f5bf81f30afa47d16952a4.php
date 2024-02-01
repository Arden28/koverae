<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value','index','input','model']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value','index','input','model']); ?>
<?php foreach (array_filter((['value','index','input','model']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalc2c70c57768ee6c33a8a42b11f4e6ebb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2c70c57768ee6c33a8a42b11f4e6ebb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown.location-dropdown','data' => ['value' => $value,'index' => $index,'input' => $input,'model' => $model]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown.location-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($index),'input' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($input),'model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($model)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2c70c57768ee6c33a8a42b11f4e6ebb)): ?>
<?php $attributes = $__attributesOriginalc2c70c57768ee6c33a8a42b11f4e6ebb; ?>
<?php unset($__attributesOriginalc2c70c57768ee6c33a8a42b11f4e6ebb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2c70c57768ee6c33a8a42b11f4e6ebb)): ?>
<?php $component = $__componentOriginalc2c70c57768ee6c33a8a42b11f4e6ebb; ?>
<?php unset($__componentOriginalc2c70c57768ee6c33a8a42b11f4e6ebb); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\storage\framework\views/42e19fea4294753373d3ef06209545a6.blade.php ENDPATH**/ ?>