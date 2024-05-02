<div>
    <?php $__env->startSection('title', $transfer->reference); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::navbar.control-panel.operation-transfer-form-panel', ['transfer' => $transfer,'event' => 'update-transfer']);

$__html = app('livewire')->mount($__name, $__params, 'lw-176396179-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('inventory::form.operation-transfer-form', ['transfer' => $transfer]);

$__html = app('livewire')->mount($__name, $__params, 'lw-176396179-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/operation-transfer/show.blade.php ENDPATH**/ ?>