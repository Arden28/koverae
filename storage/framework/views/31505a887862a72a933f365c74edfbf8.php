<div>
    <?php $__env->startSection('title', $bank->name); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contact::navbar.control-panel.bank-form-panel', ['bank' => $bank,'event' => 'update-bank']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1007577668-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('contact::form.bank-form', ['bank' => $bank]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1007577668-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div><?php /**PATH D:\My Laravel Startup\koverae\Modules/Contact\Resources/views/livewire/bank/show.blade.php ENDPATH**/ ?>