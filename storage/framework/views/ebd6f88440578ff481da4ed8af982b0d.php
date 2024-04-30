<div>
    <?php $__env->startSection('title', $packaging->name); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::navbar.control-panel.product-packaging-form-panel', ['packaging' => $packaging,'event' => 'update-packaging']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2918381095-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <!-- Form -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::form.product-packaging-form', ['packaging' => $packaging]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2918381095-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/product/packaging/show.blade.php ENDPATH**/ ?>