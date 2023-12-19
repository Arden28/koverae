<?php $__env->startSection('title', __('Ajouter un lieu de travail')); ?>



<?php $__env->startSection('content'); ?>
<div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('employee::workplace.create', []);

$__html = app('livewire')->mount($__name, $__params, 'gueC9dW', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/workplace/create.blade.php ENDPATH**/ ?>