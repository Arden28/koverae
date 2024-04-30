<div>
    <?php $__env->startSection('title', "Nouvel Attribut"); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('inventory::navbar.control-panel.product-attribute-form-panel', ['event' => 'create-attribute']);

$__html = app('livewire')->mount($__name, $__params, 'lw-23718678-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('inventory::form.product-attribute-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-23718678-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/livewire/product/attribute/create.blade.php ENDPATH**/ ?>