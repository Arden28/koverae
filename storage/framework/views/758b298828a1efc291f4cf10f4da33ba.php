<div>
    <?php $__env->startSection('title', $pos->name); ?>

    
    <div class="container-fluid">
        <div class="row">
            <!-- Left Part -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" id="product-box">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos::display.product.product-lists', ['categories' => $product_categories]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3759567800-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
            <!-- Right Part -->
            <div class="col-lg-4 gap-2 col-md-12 d-none d-lg-block" id="checkout-box">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos::display.checkout', ['pos' => $pos,'cartInstance' => 'pos-order','customers' => $customers]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3759567800-1', $__slots ?? [], get_defined_vars());

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

    <!-- Fixed Bottom Bar -->
    <div class="fixed-bar d-flex d-lg-none">
        <button class="btn-switch_pane rounded-0 fw-bolder review-button" wire:click="payClick" wire:target="payClick" id="pay-order">
            <span class="fs-1 d-block">
                Payer
            </span>
            <span>
                <?php echo e(format_currency($total_amount)); ?>

            </span>
        </button>
        <button class="btn-switch_pane text-black rounded-0 fw-bolder review-button">
            <span class="fs-1 d-block">
                Commande
            </span>
            <span>
                <?php echo e($total_items); ?> article(s)
            </span>
        </button>
    </div>

    <!-- Loading -->
    <?php echo $__env->make('includes.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/display/shop.blade.php ENDPATH**/ ?>