
<div>
    <?php $__env->startSection('title', $contact->name); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contact::navbar.control-panel.contact-form-panel', ['contact' => $contact,'event' => 'update-contact']);

$__html = app('livewire')->mount($__name, $__params, 'lw-528696941-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('contact::form.contact-form', ['contact' => $contact]);

$__html = app('livewire')->mount($__name, $__params, 'lw-528696941-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Contact\Resources/views/livewire/contact/show.blade.php ENDPATH**/ ?>