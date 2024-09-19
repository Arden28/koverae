<?php $__env->startSection('code', '👾'); ?>

<?php $__env->startSection('title', __('Page Expired')); ?>

<?php $__env->startSection('image'); ?>
<img src="<?php echo e(asset('assets/images/illustrations/errors/expire-session.svg')); ?>" height="350px" alt="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __('La page à expiré, essayer de recharger la page. Si le problème persiste, veuillez contacter notre service kovers.')); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Laravel Startup\koverae\resources\views/errors/419.blade.php ENDPATH**/ ?>