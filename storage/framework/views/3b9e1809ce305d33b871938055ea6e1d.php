<div>
    <?php $__env->startSection('title', $order->reference .' - Ordres de fabrication'); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('manufacturing::navbar.control-panel.manufacturing-order-form-panel', ['order' => $order,'event' => 'update-manufacturing-order']);

$__html = app('livewire')->mount($__name, $__params, 'lw-625587436-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('manufacturing::form.manufacturing-order-form', ['order' => $order]);

$__html = app('livewire')->mount($__name, $__params, 'lw-625587436-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Manufacturing\Resources/views/livewire/order/show.blade.php ENDPATH**/ ?>