<?php $__env->startSection('title', __('Emplois')); ?>

<?php $__env->startSection('breadcrumb'); ?>
<div class="k_control_panel_main d-flex flex-wrap flex-grow-2 flex-nowrap justify-content-between align-items-start gap-5">
    <div class="k_control_panel_breadcumbs d-flex align-items-center gap-1 order-0 h-lg-100">
        <a wire:navigate href="<?php echo e(route('employee.jobs.create', ['subdomain' => current_company()->domain_name ])); ?>" class="btn btn-outline-primary k_form_button_create">
            <?php echo e(__('Nouveau')); ?>

        </a>
        <br>
        <div class="bread d-flex gap-1 text-truncate">
            <span class="min-w-0 text-truncate" style="font-size: 17px; font-weight: 500;">
                 <?php echo e(__('Emplois')); ?>

                 <i class="bi bi-gear"></i>
            </span>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('employee::job.lists', []);

$__html = app('livewire')->mount($__name, $__params, 'EHmJode', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Employee\Resources/views/jobs/list.blade.php ENDPATH**/ ?>