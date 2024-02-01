<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>Module: <?php echo config('manufacturing.name'); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('manufacturing::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Manufacturing\Resources/views/index.blade.php ENDPATH**/ ?>