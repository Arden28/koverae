

<?php $__env->startSection('code', '404 😵'); ?>

<?php $__env->startSection('title', __('Page Introuvable')); ?>

<?php $__env->startSection('image'); ?>
    <img src="<?php echo e(asset('assets/images/illustrations/errors/undraw_sign_in_e6hj.svg')); ?>" height="128" alt="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __('Désolé, mais la page que vous cherchez est introuvable.')); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/errors/404.blade.php ENDPATH**/ ?>