<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>" wire:navigate>
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="<?php echo e(asset('assets/images/apps/purchase.png')); ?>" alt="">
          </span>
          <span class="nav-link-title">
              <?php echo e(__('Achat')); ?>

          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              <?php echo e(__('Commandes')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('purchases.requests.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Demandes de prix')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('purchases.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Bons de commande')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('purchases.blankets.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Contrat-cadres')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('purchases.vendors.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Fournisseurs')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- Products -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              <?php echo e(__('Produits')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="#">
                        <?php echo e(__('Produits')); ?>

                    </a>
                    <!--[if BLOCK]><![endif]--><?php if(settings()->has_variant): ?>
                    <a class="dropdown-item" wire:navigate href="#">
                        <?php echo e(__('Variantes Produits')); ?>

                    </a>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </li>

    <!-- Report -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              <?php echo e(__('Analyse')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.quotations.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Achat')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              <?php echo e(__('Configuration')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('settings.general', ['subdomain' => current_company()->domain_name, 'menu' => current_menu(), 'view' => 'purchase'])); ?>">
                        <?php echo e(__('Paramètre')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        <?php echo e(__('Listes de prix fournisseurs')); ?>

                    </a>
                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('Produits')); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('purchases.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('Catégories produits')); ?>

                          </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </li>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Purchase\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>