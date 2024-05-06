<!-- CoreUI CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css?'.time() )); ?>" crossorigin="anonymous">

<!-- CSS files -->
    <link href="<?php echo e(asset('assets/dist/css/tabler.min.css?'.time() )); ?>?()"  rel="stylesheet"/>
    
    <link href="<?php echo e(asset('/assets/css/style.css?'.time() )); ?>" rel="stylesheet"/>

<!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Dropezone CSS -->
    <!--<link rel="stylesheet" href="<?php echo e(asset('css/dropzone.css')); ?>">-->

    <!-- Search -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>

<?php echo $__env->yieldContent('styles'); ?>

<?php echo $__env->yieldContent('third_party_stylesheets'); ?>

<?php echo BladeUIKit\BladeUIKit::outputStyles(true); ?>

<?php echo notifyCss(); ?>

<?php echo $__env->yieldPushContent('page_css'); ?>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/includes/main-css.blade.php ENDPATH**/ ?>