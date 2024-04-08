<div>
    <?php $__env->startSection('title', $pos->name); ?>

    <!-- Control Panel -->
    <?php $__env->startSection('control-panel'); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('pos::navbar.control-panel.pos-form-panel', ['pos' => $pos,'event' => 'update-pos']);

$__html = app('livewire')->mount($__name, $__params, 'lw-56850626-0', $__slots ?? [], get_defined_vars());

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
[$__name, $__params] = $__split('pos::form.pos-form', ['pos' => $pos]);

$__html = app('livewire')->mount($__name, $__params, 'lw-56850626-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/livewire/pos/show.blade.php ENDPATH**/ ?>