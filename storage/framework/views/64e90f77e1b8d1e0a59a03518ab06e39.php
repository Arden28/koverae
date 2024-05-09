<div>

    <?php $__env->startSection('title', $quotation->reference); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('sales::navbar.control-panel.quotation-form-panel', ['quotation' => $quotation,'event' => 'update-quotation']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3556260470-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('sales::form.quotation-form', ['quotation' => $quotation]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3556260470-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH D:\My Laravel Project\koverae-app\Modules/Sales\Resources/views/livewire/quotation/show.blade.php ENDPATH**/ ?>