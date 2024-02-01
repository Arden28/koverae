<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'data',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'data',
]); ?>
<?php foreach (array_filter(([
    'value',
    'data',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
    <!-- Order Table -->
    <div class="tab-pane active show" id="<?php echo e($value->key); ?>" wire:ignore>
        <!-- Order Table -->
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('manufacturing::cart.m-o-component-cart', ['cartInstance' => 'order','data' => $this->order]);

$__html = app('livewire')->mount($__name, $__params, 'YUQuCtt', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/tabs/manufacturing-order.blade.php ENDPATH**/ ?>