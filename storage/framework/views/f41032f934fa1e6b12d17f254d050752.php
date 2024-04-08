<?php $__env->startSection('code', '403 🤐'); ?>

<?php $__env->startSection('title', __("Application non installée 🤐!")); ?>

<?php $__env->startSection('image'); ?>
    <img src="<?php echo e(asset('assets/images/illustrations/errors/undraw_bug_fixing_oc7a.svg')); ?>" height="128" alt="">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('message', __("Désolé. L'application ". $module->name." n'est pas installé pour votre entreprise")); ?>

<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/errors/module/not-installed.blade.php ENDPATH**/ ?>