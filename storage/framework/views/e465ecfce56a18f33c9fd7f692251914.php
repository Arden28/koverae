<?php $__env->startSection('title', __('Server Error')); ?>

<?php $__env->startSection('image'); ?>
<img src="<?php echo e(asset('assets/images/illustrations/errors/torn-file.svg')); ?>" height="350px" alt="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __("Une erreur c'est produite de notre côté. Si le problème persiste, veuillez contacter notre service kovers(clients).")); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/errors/500.blade.php ENDPATH**/ ?>