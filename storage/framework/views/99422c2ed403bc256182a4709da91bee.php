<div>
    <?php $__env->startSection('title', $warehouse->name .' - Entrepôts'); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::navbar.control-panel.warehouse-form-panel', ['warehouse' => $warehouse]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2065319745-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::form.warehouse-form', ['warehouse' => $warehouse]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2065319745-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/warehouse/show.blade.php ENDPATH**/ ?>