<div>
    <?php $__env->startSection('title', $pos->name); ?>

    <?php $__env->startSection('breadcrumb'); ?>
    <div class="page-header d-print-none text-black">
      <div class="container-fluid">
        <div class="row g-2 align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              <?php echo e(__('Magasin')); ?>

            </div>
            <h2 class="page-title " style="color: #fff; font-size: 22px; font-weight: 600;">
              <?php echo e($pos->name); ?>

            </h2>

          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
          </div>
        </div>
      </div>
    </div>
    <?php $__env->stopSection(); ?>
    <div class="container-fluid <?php echo e($this->show_checkout_box == false ? '' : 'd-none'); ?>">
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
            <div class="d-none col-lg-4 gap-2 col-md-12 d-lg-block" id="checkout-box">
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
        <button class="btn-switch_pane text-black rounded-0 fw-bolder review-button" wire:click="switchToOrder" wire:target="switchToOrder">
            <span class="fs-1 d-block">
                Commande
            </span>
            <span>
                <?php echo e($total_items); ?> article(s)
            </span>
        </button>
    </div>

    <!-- Order Mobile -->
    <div class="d-none <?php echo e($this->show_checkout_box == true ? 'd-block' : ''); ?>" id="checkout-box">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos::display.checkout', ['pos' => $pos,'cartInstance' => 'pos-order','customers' => $customers]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3759567800-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

    <!-- Loading -->
    <?php echo $__env->make('includes.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/display/shop.blade.php ENDPATH**/ ?>