<div>
    <?php $__env->startSection('title', $reference); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sales::navbar.control-panel.sale-form-panel', ['sale' => $sale,'event' => 'update-sale']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2955217509-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <!-- Notify -->
    <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sales::form.sale-form', ['sale' => $sale]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2955217509-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/livewire/sale/show.blade.php ENDPATH**/ ?>