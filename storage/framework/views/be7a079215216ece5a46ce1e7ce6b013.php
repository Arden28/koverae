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
<?php if (isset($component)) { $__componentOriginale6a60a7eb70d1a08f9de48061c834b40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6a60a7eb70d1a08f9de48061c834b40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input.textarea.simple','data' => ['value' => $value]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.input.textarea.simple'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6a60a7eb70d1a08f9de48061c834b40)): ?>
<?php $attributes = $__attributesOriginale6a60a7eb70d1a08f9de48061c834b40; ?>
<?php unset($__attributesOriginale6a60a7eb70d1a08f9de48061c834b40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6a60a7eb70d1a08f9de48061c834b40)): ?>
<?php $component = $__componentOriginale6a60a7eb70d1a08f9de48061c834b40; ?>
<?php unset($__componentOriginale6a60a7eb70d1a08f9de48061c834b40); ?>
<?php endif; ?><?php /**PATH D:\My Laravel Startup\koverae\storage\framework\views/e90acfa6617a8169f9107c67948b3571.blade.php ENDPATH**/ ?>