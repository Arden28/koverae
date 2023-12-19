<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(current_company()->name); ?> - <?php echo $__env->yieldContent('title'); ?> | Koverae</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo/favicon.ico')); ?>" />

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    <?php echo $__env->make('includes.main-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('includes.main-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    
</head>
<body>

    <script src="<?php echo e(asset('assets/dist/js/demo-theme.min.js')); ?>?1668287865" data-navigate-track></script>
    <div class="page">
      <!-- Navbar -->
      <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Navbar -->

      <!-- Navbar Menu -->

        <!-- Settings -->
        <?php if(request()->routeIs('settings.*')): ?>
            <?php echo $__env->make('settings::layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Employee -->
        <?php elseif(request()->routeIs('employee*')): ?>
            <?php echo $__env->make('employee::layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Dashboards -->
        <?php elseif(request()->routeIs('dashboards.*')): ?>
            <?php echo $__env->make('dashboards::layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Sale -->
        <?php elseif(request()->routeIs('sales.*')): ?>
            <?php echo $__env->make('sales::layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Contacts -->
        <?php elseif(request()->routeIs('contacts.*')): ?>
            <?php echo $__env->make('contact::layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Inventory -->
        <?php elseif(request()->routeIs('inventory.*')): ?>
            <?php echo $__env->make('inventory::layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Purhase -->
        <?php elseif(request()->routeIs('purchases.*')): ?>
            <?php echo $__env->make('purchase::layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('layouts.navbar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
      <!-- Navbar Menu -->

        <div class="page-wrapper">

            <!-- Page header -->
            <?php echo $__env->yieldContent('breadcrumb'); ?>

            <!-- Page body -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            
        </div>

    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/layouts/master.blade.php ENDPATH**/ ?>