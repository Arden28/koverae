<div>
    <?php $__env->startSection('title', $invoice->reference); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('invoicing::navbar.control-panel.invoice-form-panel', ['invoice' => $invoice,'event' => 'update-invoice']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2759511141-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <!-- Notify -->
    <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Form -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('invoicing::form.invoice-form', ['sale' => $sale,'invoice' => $invoice]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2759511141-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/livewire/sale/invoice/show.blade.php ENDPATH**/ ?>