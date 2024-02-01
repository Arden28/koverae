<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value','cartInstance']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value','cartInstance']); ?>
<?php foreach (array_filter((['value','cartInstance']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginale0dec1687c14adfefbf14adc1787584f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0dec1687c14adfefbf14adc1787584f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tabs.purchase-request','data' => ['value' => $value,'cartInstance' => $cartInstance]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tabs.purchase-request'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value),'cartInstance' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cartInstance)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0dec1687c14adfefbf14adc1787584f)): ?>
<?php $attributes = $__attributesOriginale0dec1687c14adfefbf14adc1787584f; ?>
<?php unset($__attributesOriginale0dec1687c14adfefbf14adc1787584f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0dec1687c14adfefbf14adc1787584f)): ?>
<?php $component = $__componentOriginale0dec1687c14adfefbf14adc1787584f; ?>
<?php unset($__componentOriginale0dec1687c14adfefbf14adc1787584f); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\storage\framework\views/688b21f2b4ba829524a060f0530ca71d.blade.php ENDPATH**/ ?>