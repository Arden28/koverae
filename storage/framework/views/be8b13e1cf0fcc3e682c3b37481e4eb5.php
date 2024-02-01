<!DOCTYPE HTML>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php echo $__env->yieldContent('title'); ?> | Koverae.com</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo/favicon.ico')); ?>" />

    <!-- CSS files -->
    <link href="<?php echo e(asset('assets/dist/css/tabler.min.css')); ?>?1668287865" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
  </head>
  <body >
    <div class="page">
      <div class="page-wrapper">
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl d-flex flex-column justify-content-center">
            <div class="empty">
              <div class="empty-img">
                <?php echo $__env->yieldContent('image'); ?>
              </div>
              <p class="empty-title">
                <?php echo $__env->yieldContent('code', __('Oh no')); ?>
              </p>
              <p class="empty-subtitle text-muted">
                <?php echo $__env->yieldContent('message'); ?>
              </p>
              <div class="empty-action">
                
                <a  wire:navigate href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>" class="btn btn-primary">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <i class="bi bi-house"></i>
                  <?php echo e(__("Retouner à l'acceuil")); ?>

                </a>
                
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js" defer></script>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

  </body>
</html>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/layouts/error.blade.php ENDPATH**/ ?>