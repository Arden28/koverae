<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?php echo $__env->yieldContent('title'); ?> - Koverae</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo/favicon.ico')); ?>" />
    <!-- CSS files -->
    <link href="<?php echo e(asset('assets/dist/css/tabler.min.css')); ?>?1668287865" rel="stylesheet"/>
    <link href="<?php echo e(asset('assets/dist/css/tabler-flags.min.css')); ?>?1668287865" rel="stylesheet"/>
    <link href="<?php echo e(asset('assets/dist/css/tabler-payments.min.css')); ?>?1668287865" rel="stylesheet"/>
    <link href="<?php echo e(asset('assets/dist/css/tabler-vendors.min.css')); ?>?1668287865" rel="stylesheet"/>
    <link href="<?php echo e(asset('assets/dist/css/demo.min.css')); ?>?1668287865" rel="stylesheet"/>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <wireui:scripts />
    <script src="https://unpkg.com/alpinejs" defer></script>

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
    <?php echo $__env->make('includes.main-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <?php echo $__env->make('includes.main-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <body >
    <script src="<?php echo e(asset('assets/dist/js/demo-theme.min.js')); ?>?1668287865"></script>
    <div class="page">

      <!-- Navbar -->
      <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
        <div class="container-fluid">
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="js:avoid">
                <img src="<?php echo e(asset('assets/images/logo/logo-white-gd.png')); ?>" alt="Koverae" class="navbar-brand-image">
            </a>
          </h1>

          <div class="navbar-nav flex-row order-md-last">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <i class="bi bi-list" style="font-size: 25px; line-height: 29px; color: white;"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <a href="<?php echo e(route('pos.ui.orders', ['subdomain' => current_company()->domain_name, 'pos' => current_pos()->id, 'session' =>current_pos()->sessions()->isOpened()->first()->unique_token])); ?>" class="dropdown-item">Commandes <span class="badge bg-success"></span>
                <a href="#" class="dropdown-item">Verrouiller</a>
                <a href="<?php echo e(route('pos.index', ['subdomain' => current_company()->domain_name, 'menu' => 7])); ?>" class="dropdown-item"><?php echo e(__('Arrière boutique')); ?></a>
                <a onclick="Livewire.dispatch('openModal', {component: 'pos::modal.close-session-modal', arguments: {session: <?php echo e(current_pos()->sessions()->isOpened()->first()->id); ?> }})" class="dropdown-item cursor-pointer">Fermer la session</a>
              </div>
            </div>
          </div>
          
        </div>
      </header>

      <div class="page-wrapper">
        <!-- Page header -->
        <?php echo $__env->yieldContent('breadcrumb'); ?>

        <!-- Page body -->
        <div class="page-body">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        

      </div>
    </div>

	

    <!-- Modal -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('modal.simple-modal', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-971933668-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('wire-elements-modal');

$__html = app('livewire')->mount($__name, $__params, 'lw-971933668-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    </body>
</html>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/layouts/shop.blade.php ENDPATH**/ ?>