<div>
    <?php $__env->startSection('title', __('Bon de commande fournisseur')); ?>

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Table -->
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('purchase::table.purchase-table', []);

$__html = app('livewire')->mount($__name, $__params, 'p8mkLHt', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Purchase\Resources/views/livewire/order/lists.blade.php ENDPATH**/ ?>