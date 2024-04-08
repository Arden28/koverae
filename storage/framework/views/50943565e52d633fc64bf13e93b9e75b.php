<?php $__env->startSection('styles'); ?>
    <style>
        .refund-list:hover{
            background-color: #03565B;
            color: white;
        }
        .table .active{
            background-color: #03565B;
            color: white;
        }
    </style>
<?php $__env->stopSection(); ?>
<div>
    <div class="d-print-none controls align-items-center d-flex justify-content-between mt-1 mt-lg-0 p-2 bg-400">
        <div class="buttons d-flex gap-2">
            <a href="<?php echo e(route('pos.ui', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'session' =>$pos->sessions()->isOpened()->first()->unique_token])); ?>" class="btn btn-secondary-outline">
                <i class="bi bi-skip-backward-fill"></i> <span class="ml-3">Retour</span>
            </a>
            <a href="<?php echo e(route('pos.ui', ['subdomain' => current_company()->domain_name, 'pos' => $pos->id, 'session' =>$pos->sessions()->isOpened()->first()->unique_token])); ?>" class="btn btn-primary primary">
                <?php echo e(__('Nouvelle commande')); ?>

            </a>
        </div>
    </div>
    <div class="row overflow-hidden">
        <div class="d-print-none col-md-8 orders overflow-y-auto">
            <table class="table bg-white overflow-y-auto">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numéro de commande</th>
                    <th scope="col">Client</th>
                    <th scope="col">Caissier</th>
                    <th scope="col">Total</th>
                    <th scope="col">Payé</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="cursor-pointer refund-list <?php echo e($this->selected == $order->id ? 'active' : ''); ?>" wire:click="selectOrder(<?php echo e($order->id); ?>)" wire:loading.class="bg-gray">
                        <th scope="row"><?php echo e(receipt_number($order->reference)); ?></th>
                        <td><?php echo e($order->id); ?></td>
                        <td><?php echo e($order->customer->name); ?></td>
                        <td><?php echo e($order->cashier->name); ?></td>
                        <td><?php echo e(format_currency($order->total_amount / 100)); ?></td>
                        <td><?php echo e(format_currency($order->paid_amount / 100)); ?></td>
                        <td>
                            <!--[if BLOCK]><![endif]--><?php if($order->payment_status == 'unpaid'): ?>
                                <?php echo e(__('Non payé')); ?>

                            <?php elseif($order->payment_status == 'paid'): ?>
                                <?php echo e(__('Payé')); ?>

                            <?php else: ?>
                                <?php echo e(__('Partiellement payé')); ?>

                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
        <!-- Checkout -->
        <div class="col-md-4" style="height: 100vh;">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos::display.refund', ['pos' => $pos]);

$__html = app('livewire')->mount($__name, $__params, 'lw-103065224-0', $__slots ?? [], get_defined_vars());

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
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/display/orders/lists.blade.php ENDPATH**/ ?>