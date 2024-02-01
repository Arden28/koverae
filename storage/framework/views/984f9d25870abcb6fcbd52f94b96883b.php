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

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('wire-elements-modal');

$__html = app('livewire')->mount($__name, $__params, 'pPc7K0H', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    
</head>
<body>

    <script src="<?php echo e(asset('assets/dist/js/demo-theme.min.js')); ?>?1668287865" data-navigate-track></script>
    <div class="page">
      <!-- Navbar -->
      <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Navbar -->


        <div class="page-wrapper">

            <!-- Page header -->
            <?php echo $__env->yieldContent('breadcrumb'); ?>

            <!-- Page body -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            
        </div>

    </div>
</body>
</html>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/layouts/master.blade.php ENDPATH**/ ?>