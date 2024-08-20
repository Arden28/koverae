<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

    <li class="nav-item page-module">
        <a class="nav-link kover-navlink" style="margin-right: 5px;" href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>" >
            <span class="nav-link-icon d-md-none d-lg-inline-block">
                <img class="custom-image" src="<?php echo e(asset('assets/images/apps/sales.png')); ?>" alt="">
            </span>
          <span class="nav-link-title">
              <?php echo e(__('translator::sales.navbar.module')); ?>

          </span>
        </a>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::sales.navbar.orders.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.quotations.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.orders.quotation')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.orders.order')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.customers.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.orders.customer')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.teams.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.orders.teams')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- To invoice -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::sales.navbar.to_invoice.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice', 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.to_invoice.orders')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- Products -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::sales.navbar.product.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('inventory.products.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.product.products')); ?>

                    </a>
                    <!--[if BLOCK]><![endif]--><?php if(settings()->has_variant): ?>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('inventory.products.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.product.variants')); ?>

                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php if(settings()->has_pricelist_check): ?>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.pricelists.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.product.pricelists')); ?>

                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php if(settings()->has_sale_program): ?>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.programs.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.product.discounts')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.programs.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.product.giftcards')); ?>

                    </a>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
        </div>
    </li>

    <!-- Report -->
    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::sales.navbar.report.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.analysis', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.report.sales')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        <?php echo e(__('translator::sales.navbar.report.sellers')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        <?php echo e(__('translator::sales.navbar.report.customers')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="#">
                        <?php echo e(__('translator::sales.navbar.report.products')); ?>

                    </a>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown" data-turbolinks>
        <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
          <span class="nav-link-title">
            <?php echo e(__('translator::sales.navbar.configuration.name')); ?>

          </span>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-menu-columns">
                <!-- Left Side -->
                <div class="dropdown-menu-column">
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('settings.general', ['subdomain' => current_company()->domain_name, 'page' => 'sales', 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.configuration.setting')); ?>

                    </a>
                    <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.teams.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>">
                        <?php echo e(__('translator::sales.navbar.configuration.sales_teams')); ?>

                    </a>

                    <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <?php echo e(__('translator::sales.navbar.configuration.orders.name')); ?>

                    </a>
                    <div class="dropdown-menu">
                      <a wire:navigate href="#" class="dropdown-item">
                        <?php echo e(__('translator::sales.navbar.configuration.orders.tags')); ?>

                      </a>
                    </div>
                    <div class="dropend">
                        <a class="dropdown-item" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            <?php echo e(__('translator::sales.navbar.configuration.products.name')); ?>

                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="<?php echo e(route('purchases.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                                <?php echo e(__('translator::sales.navbar.configuration.products.categories')); ?>

                            </a>
                            <!--[if BLOCK]><![endif]--><?php if(settings()->has_variant): ?>
                            <a wire:navigate href="<?php echo e(route('purchases.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                                <?php echo e(__('translator::sales.navbar.configuration.products.attributes')); ?>

                            </a>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                    <!-- Has uom-->
                    <?php if(settings()->has_uom): ?>
                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          <?php echo e(__('Unités de mesure')); ?>

                        </a>
                        <div class="dropdown-menu">
                            <a wire:navigate href="<?php echo e(route('purchases.products.categories.index', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()])); ?>" class="dropdown-item">
                              <?php echo e(__("Catégories UdM")); ?>

                            </a>
                        </div>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </div>
            </div>
        </div>
    </li>
</div>
<?php /**PATH D:\My Laravel Startup\koverae\Modules/Sales\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>