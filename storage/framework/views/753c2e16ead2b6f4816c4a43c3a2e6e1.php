<li class="nav-item page-module">
    <a class="nav-link kover-navlink" style="margin-right: 5px;" wire:navigate href="<?php echo e(route('main', ['subdomain' => current_company()->domain_name])); ?>" >
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <img class="custom-image" src="<?php echo e(asset('assets/images/apps/sales.png')); ?>" alt="">
        </span>
      <span class="nav-link-title">
          <?php echo e(__('Ventes')); ?>

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
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.quotations.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Devis')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Commandes')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.customers.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Clients')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.teams.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Equipes commerciales')); ?>

                </a>
            </div>
        </div>
    </div>
</li>

<!-- To invoice -->
<li class="nav-item dropdown" data-turbolinks>
    <a class="nav-link kover-navlink" href="#navbar-base" style="margin-right: 5px;" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
      <span class="nav-link-title">
          <?php echo e(__('A Facturer')); ?>

      </span>
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <!-- Left Side -->
            <div class="dropdown-menu-column">
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.index', ['subdomain' => current_company()->domain_name, 'to' => 'to_invoice'])); ?>">
                    <?php echo e(__('Commandes à facturer')); ?>

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
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.products.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Produits')); ?>

                </a>
            </div>
        </div>
    </div>
</li>

<!-- Report -->
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
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.quotations.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Ventes')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.quotations.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Vendeurs')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.quotations.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Clients')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.quotations.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Produits')); ?>

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
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('settings.general', ['subdomain' => current_company()->domain_name, 'page' => 'sales'])); ?>">
                    <?php echo e(__('Paramètre')); ?>

                </a>
                <a class="dropdown-item" wire:navigate href="<?php echo e(route('sales.teams.index', ['subdomain' => current_company()->domain_name])); ?>">
                    <?php echo e(__('Equipes Commerciales')); ?>

                </a>

                <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <?php echo e(__('Commandes')); ?>

                </a>
                <div class="dropdown-menu">
                  <a wire:navigate href="<?php echo e(route('employee.department.index', ['subdomain' => current_company()->domain_name])); ?>" class="dropdown-item">
                    <?php echo e(__('Etiquettes')); ?>

                  </a>
                </div>

            </div>
        </div>
    </div>
</li>
<?php /**PATH C:\wamp64\www\my-startups\app.koverae\Modules/Sales\Resources/views/layouts/navbar-menu.blade.php ENDPATH**/ ?>