<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item page-module">
        <a class="nav-link kover-navlink" style="margin-right: 5px;" wire:navigate href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>" >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <img class="custom-image" src="<?php echo e(asset('assets/images/apps/inventory.png')); ?>" alt="">
            </span>
          <span class="nav-link-title">
              <?php echo e(__('Inventaire')); ?>

          </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link kover-navlink" style="margin-right: 5px;" wire:navigate href="<?php echo e(route('inventory.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" >
          <span class="nav-link-title">
              <?php echo e(__("Vue d'ensemble")); ?>

          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              <?php echo e(__('Operations')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('Tranferts')); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'receipt', 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('Réceptions')); ?>

                          </a>
                          <a wire:navigate href="<?php echo e(route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'delivery', 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('Livraisons')); ?>

                          </a>
                          <!--[if BLOCK]><![endif]--><?php if(settings()->has_storage_locations): ?>
                          <a wire:navigate href="<?php echo e(route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'internal_transfer', 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('Internes')); ?>

                          </a>
                          <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                          <!--[if BLOCK]><![endif]--><?php if(module('manufacturing')): ?>
                          <a wire:navigate href="<?php echo e(route('inventory.operation-transfers.index', ['subdomain' => current_company()->domain_name, 'type' => 'manufacturing', 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('Fabrications')); ?>

                          </a>
                          <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            <?php echo e(__('Ajustements')); ?>

                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="<?php echo e(route('inventory.adjustments.physical.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                                <?php echo e(__('Inventaire physique')); ?>

                            </a>
                            <a wire:navigate href="<?php echo e(route('inventory.adjustments.scraps.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                                <?php echo e(__('Rébuts')); ?>

                            </a>
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            <?php echo e(__('Approvisionnement')); ?>

                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="#" class="dropdown-item">
                                <?php echo e(__('Réapprovisionnement')); ?>

                            </a>
                        </div>
                    </div>

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
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('inventory.products.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Produits')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- Analytics -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
              <?php echo e(__('Rapport')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Stock')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Emplacements')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Historique de mouvements')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Analyses de mouvement')); ?>

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
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('settings.general', ['subdomain' => current_company()->domain_name, 'view' => 'inventory', 'menu' => current_menu()])); ?>">
                        <?php echo e(__('Paramètre')); ?>

                    </a>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__("Gestion d'entrepôts")); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('inventory.warehouses.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('Entrepôts')); ?>

                          </a>
                          <a wire:navigate href="<?php echo e(route('inventory.operation-types.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__("Types d'opérations")); ?>

                          </a>
                          <!--[if BLOCK]><![endif]--><?php if(settings()->has_storage_locations): ?>
                          <a wire:navigate href="<?php echo e(route('inventory.locations.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('Emplacements')); ?>

                          </a>
                          <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                          <!--[if BLOCK]><![endif]--><?php if(settings()->has_storage_locations): ?>
                          <a wire:navigate href="<?php echo e(route('inventory.warehouses.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__("Règles d'affectation")); ?>

                          </a>
                          <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__("Produits")); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('inventory.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__('Catégories de produits')); ?>

                          </a>
                          <!--[if BLOCK]><![endif]--><?php if(settings()->has_package): ?>
                          <a wire:navigate href="<?php echo e(route('employee.department.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__("Emballages de produits")); ?>

                          </a>
                          <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__("Unités de mesures")); ?>

                        </a>
                        <div class="dropdown-menu">
                          <a wire:navigate href="<?php echo e(route('employee.department.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                            <?php echo e(__("Catégories d'unité de mesure")); ?>

                          </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </li>

</div>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Inventory\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>