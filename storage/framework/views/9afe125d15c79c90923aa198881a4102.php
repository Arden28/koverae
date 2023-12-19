<div>
    <?php $__env->startSection('title', __($invoice->reference)); ?>

    <!-- Notify -->
    <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('invoicing::form.bill-form', ['purchase' => $purchase,'invoice' => $invoice]);

$__html = app('livewire')->mount($__name, $__params, 'BlqPuMf', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Purchase\Resources/views/livewire/invoice/invoice-show.blade.php ENDPATH**/ ?>