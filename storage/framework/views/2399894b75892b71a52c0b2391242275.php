<div>
    <div class="card-lg border-0 shadow-sm bg-white">
        <div class="card-body" id="left-product-side-product">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('search.input-search', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1990700821-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos::display.product.filter', ['categories' => $categories]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1990700821-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <!-- Loading spinner -->
            <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                <div class="spinner-border" style="color: #045054;" role="status">
                    <span class="sr-only"></span>
                </div>
            </div>
            <div class="product-list row gap-2 p-1 overflow-y-auto h-screen">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="flex-column product position-relative d-flex align-items-start ps-0 text-start cursor-pointer transition-base">
                    <!-- Product Tag Info -->
                    <div class="product-information-tag mb-3 position-absolute" style="right:0px;top: 0px;">
                        <i class="bi bi-info" style="font-size: 14px;"></i>
                    </div>
                    <!-- Product Stock Info -->
                    <div class="badge badge-info mb-3 position-absolute" style="left:10px;top: 10px;"><?php echo e($product->product_quantity); ?></div>
                    <!-- Product Image -->
                    
                    <!--[if BLOCK]><![endif]--><?php if($product->image_path): ?>
                    <img wire:click.prevent="selectProduct(<?php echo e($product); ?>)" src="<?php echo e(Storage::disk('public')->url($product->image_path)); ?>" class="card-img-top w-100" alt="<?php echo e($product->product_name); ?>">
                    <?php else: ?>
                    <img wire:click.prevent="selectProduct(<?php echo e($product); ?>)" src="<?php echo e(asset('assets/images/default/product.png')); ?>" class="card-img-top w-100" alt="<?php echo e($product->product_name); ?>">
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <div class="product-content d-flex flex-column justify-content-between mx-2 py-1">
                        <!-- Product Name -->
                        <div class="product-name no-image fw-bolder overflow-hidden lh-sm" id="product_<?php echo e($product->id); ?>">
                            <?php echo e($product->product_name ? Str::limit($product->product_name, 10, '...') : __('Produit')); ?>

                        </div>
                        <span class="price-tag py-1 fw-bolder" style="color: #045054;">
                            <?php echo e(format_currency(calculate_item_price($product))); ?>

                        </span>
                    </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mt-3' => $products->hasPages()]); ?>">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/display/product/product-lists.blade.php ENDPATH**/ ?>