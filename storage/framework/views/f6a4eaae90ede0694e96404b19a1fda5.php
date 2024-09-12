<?php $__env->startSection('title', __('Page Introuvable')); ?>

<?php $__env->startSection('image'); ?>
    <img src="<?php echo e(asset('assets/images/illustrations/errors/404_error.svg')); ?>" height="350px" alt="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __("Pas de panique. Si vous pensez que c'est une erreur de notre part, veuillez nous envoyer un message à cette page.")); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Laravel Startup\koverae\resources\views/errors/404.blade.php ENDPATH**/ ?>