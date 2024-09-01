<div>
    <?php $__env->startSection('title', __('Utilisateurs')); ?>

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            <?php echo $__env->make('notify::components.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Table -->
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user::table.users-table', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3408145855-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/User\Resources/views/livewire/user/user-list.blade.php ENDPATH**/ ?>