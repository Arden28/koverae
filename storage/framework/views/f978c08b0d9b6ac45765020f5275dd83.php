<div>
    <?php $__env->startSection('title', __($request->reference)); ?>

    <!-- Notify -->
    <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('purchase::form.request-quotation-form', ['request' => $request]);

$__html = app('livewire')->mount($__name, $__params, 'zYnyvoJ', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Purchase\Resources/views/livewire/order/request/show.blade.php ENDPATH**/ ?>