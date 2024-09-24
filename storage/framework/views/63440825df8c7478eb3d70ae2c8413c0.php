
<div>
    <?php $__env->startSection('title', $level->description); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('invoicing::navbar.control-panel.reminder-level-form-panel', ['level' => $level,'event' => 'update-level']);

$__html = app('livewire')->mount($__name, $__params, 'lw-3191047757-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('invoicing::form.follow-up-level-form', ['level' => $level]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3191047757-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Invoicing\Resources/views/livewire/reminder-level/show.blade.php ENDPATH**/ ?>