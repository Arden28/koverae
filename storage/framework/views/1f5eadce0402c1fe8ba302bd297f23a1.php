<div>
    <?php $__env->startSection('title', "Nouveau Produit"); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::navbar.control-panel.product-form-panel', ['event' => 'create-product']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3431136926-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <!-- Form -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::form.product-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3431136926-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/product/create.blade.php ENDPATH**/ ?>