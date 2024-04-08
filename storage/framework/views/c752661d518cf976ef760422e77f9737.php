<div>
    <?php $__env->startSection('title', $order->reference); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos::navbar.control-panel.pos-form-panel', ['order' => $order,'event' => 'update-order']);

$__html = app('livewire')->mount($__name, $__params, 'lw-220639708-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('pos::form.pos-form', ['order' => $order]);

$__html = app('livewire')->mount($__name, $__params, 'lw-220639708-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/pos-order/show.blade.php ENDPATH**/ ?>