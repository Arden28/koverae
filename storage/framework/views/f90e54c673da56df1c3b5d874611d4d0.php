<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'value',
    'index',
    'input',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'value',
    'index',
    'input',
]); ?>
<?php foreach (array_filter(([
    'value',
    'index',
    'input',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('search.dynamic-search-dropdown', ['index' => $index,'value' => collect($value)->except('type')->all(),'model' => 'Modules\Inventory\Entities\Warehouse\Location\WarehouseLocation','searchAttributes' => ['name', 'type'],'additionalCriteria' => [],'event' => 'location-selected']);

$__html = app('livewire')->mount($__name, $__params, $input, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<!-- Exclude 'type' property -->
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/components/dropdown/location-dropdown.blade.php ENDPATH**/ ?>