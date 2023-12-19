

<?php $__env->startSection('code', '500 🤕'); ?>

<?php $__env->startSection('title', __('Server Error')); ?>

<?php $__env->startSection('image'); ?>
    <img src="<?php echo e(asset('assets/images/illustrations/errors/undraw_bug_fixing_oc7a.svg')); ?>" height="128" alt="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __('Something went wrong. Call the dev!!!')); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/errors/500.blade.php ENDPATH**/ ?>