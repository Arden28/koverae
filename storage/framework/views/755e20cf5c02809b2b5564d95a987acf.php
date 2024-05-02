<div>
    <?php $__env->startSection('title', $bom->name .' - Nomenclatures'); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('manufacturing::navbar.control-panel.bom-form-panel', ['bom' => $bom,'event' => 'update-bom']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2842867378-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php $__env->stopSection(); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('manufacturing::form.bom-form', ['bom' => $bom]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2842867378-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Manufacturing\Resources/views/livewire/bom/show.blade.php ENDPATH**/ ?>