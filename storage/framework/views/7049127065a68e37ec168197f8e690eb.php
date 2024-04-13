<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(current_company()->name); ?> - Koverae</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo/favicon.ico')); ?>" />
        <!-- CoreUI CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>" crossorigin="anonymous">
        <link href="<?php echo e(asset('assets/dist/css/tabler.min.css')); ?>?166828782"  rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css?'.time())); ?>">
        <link href="<?php echo e(asset('/assets/css/style.css?'.time())); ?>" rel="stylesheet"/>

        <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>

        <!-- Header -->

        <!-- Logo -->
        <div class="centered-logo justify-content-center text-center align-items-center" style="height: 60px;margin: 0 0 8px 0;">
            <img src="<?php echo e(asset('assets/images/logo/logo-black-gd.png')); ?>" alt="Koverae Logo" class="navbar-brand-image" style="height: 45px">
        </div>
        <div class="k_home_menu overflow-x-hidden">
            <div class="container justify-content-center text-center align-items-center mb-2">

                <div class="database_expiration_panel">
                    <span class="k_instance_register_main">
                        Votre essai gratuit expire dans <b><?php echo e(Auth::user()->team->getTrialPeriodRemainingUsageIn('day')); ?> jours</b>. L'abonnement choisi débutéra immédiatement après la fin de votre essai.
                    </span>
                </div>

                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('module.main-list', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-447806845-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>

        <!-- Tabler Core -->
        <script src="<?php echo e(asset('assets/dist/js/tabler.min.js')); ?>?1668287865" ></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const chatButton = document.getElementById("chatButton");
                const sideNav = document.getElementById("sideNav");
                const closeIcon = document.getElementById("closeIcon");

                // Function to open the side navigation panel
                function openNav() {
                    sideNav.classList.add("active");
                }

                // Function to close the side navigation panel
                function closeNav() {
                    sideNav.classList.remove("active");
                }

                // Toggle navigation panel on button click
                chatButton.addEventListener("click", function () {
                    openNav();
                });

                // Close navigation panel on close icon click
                closeIcon.addEventListener("click", function () {
                    closeNav();
                });

                // Close navigation panel on clicking outside of it
                document.addEventListener("click", function (event) {
                    if (!sideNav.contains(event.target) && !chatButton.contains(event.target)) {
                        closeNav();
                    }
                });
            });
        </script>

        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    </body>
</html>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\resources\views/main.blade.php ENDPATH**/ ?>