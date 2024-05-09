<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['title']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['title']); ?>
<?php foreach (array_filter((['title']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<p class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    'text-sm leading-5 font-medium capitalize',
    'text-slate-900' => config('notify.theme') === 'light',
    'text-white' => config('notify.theme') !== 'light',
]); ?>">
    <?php echo e($title); ?>

</p>
<?php /**PATH D:\My Laravel Project\koverae-app\vendor\mckenziearts\laravel-notify\src/../resources/views/components/notify-title.blade.php ENDPATH**/ ?>