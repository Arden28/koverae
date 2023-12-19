<?php $__env->startSection('title', __('Employés')); ?>



<?php $__env->startSection('content'); ?>
<div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('employee::employees.employee', []);

$__html = app('livewire')->mount($__name, $__params, 'KAiQjO3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/employees/employee.blade.php ENDPATH**/ ?>