<div>
    <?php $__env->startSection('title', __('Bank Account')); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contact::navbar.control-panel.bank-account-form-panel', ['account' => $account,'event' => 'update-bank-account']);

$__html = app('livewire')->mount($__name, $__params, 'lw-2971185224-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('contact::form.bank-account-form', ['account' => $account]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2971185224-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Contact\Resources/views/livewire/bank/account/show.blade.php ENDPATH**/ ?>