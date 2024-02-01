<div>
    <?php $__env->startSection('title', "Nouvel ordre de fabrication"); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('manufacturing::navbar.control-panel.manufacturing-order-form-panel', []);

$__html = app('livewire')->mount($__name, $__params, 'CpriMOx', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('manufacturing::form.manufacturing-order-form', []);

$__html = app('livewire')->mount($__name, $__params, 'AanawSn', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Manufacturing\Resources/views/livewire/order/create.blade.php ENDPATH**/ ?>