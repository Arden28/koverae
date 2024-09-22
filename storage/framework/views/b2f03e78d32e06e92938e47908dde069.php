<div>
    <?php $__env->startSection('title', $tag->name); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('contact::navbar.control-panel.tag-form-panel', ['tag' => $tag,'event' => 'update-contact-tag']);

$__html = app('livewire')->mount($__name, $__params, 'lw-1582157838-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('contact::form.contact-tag-form', ['tag' => $tag]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1582157838-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Contact\Resources/views/livewire/tag/show.blade.php ENDPATH**/ ?>