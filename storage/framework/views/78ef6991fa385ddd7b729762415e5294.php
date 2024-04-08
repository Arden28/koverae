<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>">
          <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="<?php echo e(asset('assets/images/apps/pos.png')); ?>" alt="">
          </span>
          <span class="nav-link-title">
              <?php echo e(__('Point de ventes')); ?>

          </span>
        </a>
    </li>

    <li class="nav-item" data-turbolinks>
        <a class="nav-link kover-navlink" wire:navigate style="margin-right: 5px;" href="<?php echo e(route('pos.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
          <span class="nav-link-title">
              <?php echo e(__('Tableau de bord')); ?>

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
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('pos.orders', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Commandes')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Paiements')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('contacts.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Clients')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Sessions')); ?>

                    </a>

                </div>
            </div>
        </div>
    </li>

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
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('inventory.products.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Produits')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Combinaisons')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Listes de prix')); ?>

                    </a>

                </div>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              <?php echo e(__('Analyses')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Commandes')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Rapport de session')); ?>

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
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Paramètres')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Moyen de paiement')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Pièces/Billets')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('pos.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Point de ventes')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('dashboards.lists', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Plans de pièces')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>
</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Pos\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>