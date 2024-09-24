
<div>
    <?php $__env->startSection('title', __('New Follow-up Level')); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('invoicing::navbar.control-panel.reminder-level-form-panel', ['event' => 'create-level']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1036521808-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('invoicing::form.follow-up-level-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1036521808-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Invoicing\Resources/views/livewire/reminder-level/create.blade.php ENDPATH**/ ?>